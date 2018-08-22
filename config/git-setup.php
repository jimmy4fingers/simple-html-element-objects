<?php
copy("config\\hooks\\pre-commit", ".git\\hooks\\pre-commit");
echo "git pre-commit hook added.";