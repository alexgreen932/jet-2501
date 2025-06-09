<?php


function jet_autoloader(string $relative_path, string $mode = 'class'): void {
    $path = get_template_directory() . '/'. trim($relative_path, '/');
    // dd($path);

    if (!is_dir($path)) return;

    foreach (glob($path . '/*.php') as $file) {
    require_once $file;

    if ($mode === 'class') {
        $class_name = pathinfo($file, PATHINFO_FILENAME);
        if (class_exists($class_name)) {
            $var_name = '$' . strtolower($class_name);
            global $$var_name;
            if (!isset($$var_name)) {
                $$var_name = new $class_name(); // don't call Jrouter here
            }
        }
    }
}

}