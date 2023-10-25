<?php
namespace xxAROX\Playground\utils;

final class Utils {
    public static function folder_root(string ...$folder): string{
        return dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $folder);
    }
    public static function folder_resources(string ...$folder): string{
        return Utils::folder_root("resources", ...$folder);
    }
    public static function isActive(string $action = null): string{
        return ((isset($_GET["action"])) ? mb_strtolower($_GET["action"]) === mb_strtolower($action) : is_null($action)) ? " active " : "";
    }
}
