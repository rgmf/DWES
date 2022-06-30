<?php

function show_help($program_name) {
    echo <<<EOT
    Usage: php $program_name [-h] options

    options:
        -u, --github-users          GitHub's users file, one user per line
        -r, --repository-name       GitHub's repository name
        -j, --json-file             JSON file's name in the repository
        -a, --answers-json-file     JSON file's path with responses

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

$short_opts = "u:r:j:a:h";
$long_opts = [
    "github-users:",
    "repository-name:",
    "json-file:",
    "answers-json-file",
    "help",
];

$options = getopt($short_opts, $long_opts);

$users_file = "";
$repository_name = "";
$json_file = "";
$answers_json_file = "";

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
} else if (in_array("json-file", $options, true)) {
    $repository_name = $options["repository-name"];
} else {
    echo "Error: option -r is required", "\n";
    show_help($argv[0]);
    exit(-1);
}

if (array_key_exists("j", $options)) {
    $json_file = $options["j"];
} else if (in_array("json-file", $options, true)) {
    $json_file = $options["json-file"];
} else {
    echo "Error: option -j is required", "\n";
    show_help($argv[0]);
    exit(-1);
}

if (array_key_exists("a", $options)) {
    $answers_json_file = $options["a"];
} else if (in_array("answers-json-file", $options, true)) {
    $answers_json_file = $options["answers-json-file"];
} else {
    echo "Error: option -a is required", "\n";
    show_help($argv[0]);
    exit(-1);
}

if (!file_exists($users_file)) {
    echo "Error: el fichero $users_file no existe", "\n";
    exit(-1);
}
if (!file_exists($answers_json_file)) {
    echo "Error: el fichero $answers_json_file no existe", "\n";
    exit(-1);
}

$users_array = array_map(function ($item) {
    return substr($item, 0, -1);
}, file($users_file));
foreach ($users_array as $username) {
    $github_url = "git@github.com:$username/$repository_name.git";
    shell_command("git clone $github_url $username");

    $questions = json_decode(file_get_contents("$username/$json_file", true));
    $ok_answers = 0;
    foreach (json_decode(file_get_contents("practica.json"), true) as $q) {
        $res_filtered = array_filter(
            json_decode(file_get_contents($answers_json_file), true),
            function ($item) use ($q) {
                return ($item["pregunta"] === $q["pregunta"] && in_array($q["respuesta"], $item["respuesta"])) ? true : false;
            });
        $ok_answers += count($res_filtered);
    }

    $mark = (count($questions) > 0 ? $ok_answers / count($questions) : 0) * 10;

    echo "================================", "\n";
    echo "$username: $mark", "\n";
}