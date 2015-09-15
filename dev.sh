#!/bin/bash

echo ""
echo "Setting up Gametracker development environment."

cd editor
php -f scheduler.php
cd ..

echo "Installing example team configuration files."
echo ""

cp avs/config.example avs/config.json
echo "Colorado Avalanche..."
cp broncos/config.example broncos/config.json
echo "Denver Broncos..."
cp csu/config.example csu/config.json
echo "Colorado State Rams..."
cp cu/config.example cu/config.json
echo "Colorado Buffaloes..."
cp nuggets/config.example nuggets/config.json
echo "Denver Nuggets..."

echo ""
echo "All done!"
echo ""