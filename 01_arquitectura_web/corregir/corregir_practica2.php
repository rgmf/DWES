<?php

########## Aux functions
function show_help($program_name) {
    echo <<<EOT
    Usage: php $program_name [-h] options

    options:
        -u, --github-users      GitHub users file, one per line
        -r, --repository-name   Name of the repository

    EOT;
}

function shell_command($cmd) {
    $return_value = NULL;
    $output = [];
    exec($cmd, $output, $return_value);
    if ($return_value != 0) {
        echo "Error: falló el comando: $cmd", "\n";
        exit(-1);
    }
    return $output;
}

########## Read input arguments
$short_opts = "u:r:h";
$long_opts = [
    "github-users:",
    "repository-name:",
    "help",
];

$options = getopt($short_opts, $long_opts);

$users_file = "";
$repository_name = "";

if (array_key_exists("h", $options) || array_key_exists("help", $options)) {
    show_help($argv[0]);
    exit(0);
}

if (array_key_exists("u", $options)) {
    $users_file = $options["u"];
} else if (in_array("github-users", $options, true)) {
    $users_file = $options["github-users"];
} else {
    echo "Error: option -u is required", "\n";
    show_help($argv[0]);
    exit(-1);
}

if (array_key_exists("r", $options)) {
    $repository_name = $options["r"];
} else if (in_array("repository-name", $options, true)) {
    $repository_name = $options["repository-name"];
} else {
    echo "Error: option -r is required", "\n";
    show_help($argv[0]);
    exit(-1);
}

if (!file_exists($users_file)) {
    echo "Error: el fichero $users_file no existe", "\n";
    exit(-1);
}

########## Extract '\n' at the end of every user in the array of users
$users_array = array_map(function ($item) {
    return substr($item, 0, -1);
}, file($users_file));

########## Compute mark for every user
$users_marks = [];
foreach ($users_array as $username) {
    $github_url = "git@github.com:$username/$repository_name.git";
    shell_command("git clone $github_url $username");
    $json_data = json_decode(file_get_contents("$username/practica1.json"), true);
    $mark = 0;
    foreach ($json_data as $q) {
        echo $q["pregunta"], "\n";
        echo $q["respuesta"], "\n";
        $mark += (readline("Nota para esta pregunta [0 => mal, 5 => mal expresada, 10 => bien): ") / 10);
        echo "\n";
    }

    $users_marks[$username] = $mark / count($json_data) * 10;

    shell_command("rm -rf $username");
}

########## Show all users marks
echo "\n", "Notas:", "\n";
foreach ($users_marks as $username => $mark) {
    echo $username, "\t", $mark, "\n";
}
