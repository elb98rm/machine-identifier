<?php
/**
 * MachineIdentifier.php
 *
 * MachineIdentifier class
 *
 * php 7+
 *
 * @category  None
 * @package   Floor9design\MachineIdentifier
 * @author    Rick Morice <rick@floor9design.com>
 * @license   MIT
 * @version   0.1.0
 * @link      http://floor9design.com
 * @see       http://floor9design.com
 * @since     File available since Release 0.1.0
 *
 */

namespace Floor9design\MachineIdentifier;

/**
 * Class MachineIdentifier
 *
 * This helper offers the uniqueMachineId function, allowing a machine-unique ID to be generated based on the
 * UUID given by the hard disk manufacturer.
 *
 * @category  None
 * @package   Floor9design\MachineIdentifier
 * @author    Rick Morice <rick@floor9design.com>
 * @copyright Solderstar Ltd (solderstar.com)
 * @license   MIT
 * @version   0.1.0
 * @link      http://floor9design.com
 * @see       http://floor9design.com
 * @since     File available since Release 0.1.0
 */
class MachineIdentifier
{
    /**
     * This function creates a unique ID based on hardware (Hard disk UUID)
     *
     * @param string $salt optional salt for the process
     * @return string
     */
    function uniqueMachineId(string $salt = "") : string
    {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $temp = sys_get_temp_dir() . DIRECTORY_SEPARATOR . "diskpartscript.txt";
            if (!file_exists($temp) && !is_file($temp)) {
                file_put_contents($temp, "select disk 0\ndetail disk");
            }
            $output = shell_exec("diskpart /s " . $temp);
            $lines = explode("\n", $output);
            $result = array_filter($lines, function ($line) {
                return stripos($line, "ID:") !== false;
            });
            if (count($result) > 0) {
                $values = array_values($result);
                $result = array_shift($values);
                $result = explode(":", $result);
                $result = trim(end($result));
            } else {
                $result = $output;
            }
        } else {
            $result = shell_exec("blkid -o value -s UUID");
            if (stripos($result, "blkid") !== false) {
                $result = $_SERVER['HTTP_HOST'];
            }
        }
        $id = md5($salt . md5($result));

        return $id;
    }
}