# Inställningar för post-sidan för vuxhalland

## Hur man använder Region Hallands plugin "region-halland-main-post-settings-vuxhalland"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-main-post-settings-vuxhalland".


## Användningsområde

Denna plugin skapar extra-fält nederst på en post-sida


## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-main-post-settings-vuxhalland.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-main-post-settings-vuxhalland.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-main-post-settings-vuxhalland": "1.0.0"
},
```


## Versionhistorik

### 1.0.0
- Första version