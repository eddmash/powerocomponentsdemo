#!/usr/bin/env bash
php pmanager migrate
php pmanager faker:generatedata -r 50 -s 123456

