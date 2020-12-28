#!/usr/bin/env bash

CURRENT_BRANCH=$(git branch --show-current)

if [[ "${CURRENT_BRANCH}" != "develop" ]]; then
    echo 'Publishing allowed'
    else
    echo "Publishing disallowed"
    echo "ERROR: Invalid deployment from ${CURRENT_BRANCH}."
    exit 1
fi
