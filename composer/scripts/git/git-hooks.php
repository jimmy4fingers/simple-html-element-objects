<?php
copy(
    "composer".DIRECTORY_SEPARATOR."scripts".DIRECTORY_SEPARATOR."git".DIRECTORY_SEPARATOR."hooks".DIRECTORY_SEPARATOR."pre-commit",
    ".git".DIRECTORY_SEPARATOR."hooks".DIRECTORY_SEPARATOR."pre-commit"
);
echo "===== git pre-commit hook added." . PHP_EOL;