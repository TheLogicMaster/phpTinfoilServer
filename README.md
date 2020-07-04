# phpTinfoilServer
A php file for serving Nintendo Switch games for Tinfoil

## Usage
This is just a simple php file, so serve it with your favorite flavor of web server. Edit the gameDir and ignoreDirs variables if your game directory isn't at the default webAppDir/Games location or you want to ignore directories in your games folder. This doesn't support subdirectories because I couldn't quite be bothered to separate files and directories in php or sort my game collection again. I use Docker Compose to serve it and link my game directory to the web app directory.

### Docker Compose Example

``` yml
version: "3.4"

services:
  php:
    image: php:7-apache
    container_name: php
    restart: unless-stopped
    ports:
      - 8080:80/tcp
    volumes:
      - /path/to/phpDir:/var/www/html
      - /path/to/games:/var/www/html/Games
```

## Background
I whipped this together in a few minutes to get the ability to serve my Switch games without the need for a desktop or terminal program from my headless NAS. This is the first php script I have ever written, so it's perfect for production code. As much as I love Goldleaf and Awoo Installer, the convenience of automatically installing updates and DLC won out. The benefit of this over any directory indexing program is the filesize support that Tinfoil uses. As a Kosmos(now DeepSea)/Hekate modchip user, I thought Tinfoil was out, but it seems that by using fusee-primary, everything plays nicely. 
