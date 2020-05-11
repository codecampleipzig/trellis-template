## Installation

1. Clone [Trellis]()
    ```sh
    $ mkdir domain.tld && cd domain.tld
    $ git clone --depth=1 git@github.com:roots/trellis.git && rm -rf trellis/.git
    ```
2. Install [Bedrock Site Template](https://github.com/codecampleipzig/site-template):
    ```sh
    $ git clone https://github.com/codecampleipzig/site-template.git site  && cd site && rm -rf .git
    $ cp .env.example .env && code .env
    ```
    Edit .env
    Actually get's overwritten if used with Trellis, but we need it for ACF_PRO_KEY to run Composer Install. Edit composer.json for needed packages now.
    ```sh
    $ composer install
    ```
3. Create Readme File with a "Log"
4. Configure Local Domain in `trellis/group_vars/development/wordpress_sites.yml` and add following
    ```
    site_title: Example
    admin_user: example
    ```
5. Configure Local Domain in `trellis/group_vars/development/vault.yml`
6. Vagrant Up:
    ```sh
    $ cd ../trellis && vagrant up
    ```
    If Local `ERR_EMPTY_RESPONSE` do (see [Trellis Troubleshooting](https://roots.io/trellis/docs/troubleshooting/))
    ```sh
    $ SKIP_GALAXY=true ANSIBLE_TAGS=wordpress vagrant reload --provision
    $ vagrant hostmanager
    ```
    For NFS Catalina fix edit '/etc/exports' and add '/System/Volumes/Data/'
7. Vagrant SSH:
    ```sh
    $ vagrant ssh
    $ sh /srv/www/example.com/current/scripts/wp-reset-options.sh
8. Deploy with [Bedrock Deployer](https://github.com/mmoollllee/bedrock-deployer):
    1. Create GitHub Repo
    2. Setup Plesk Environment (bin/bash, add SSH-Key)
    3. SSH into Webserver, create SSH key and add pub key to [GitHub Repo Deploy Keys](https://github.com/mmoollllee/site-template/settings/keys)
    ```sh
    $ ssh-keygen -t rsa -b 4096 -C "your_email@example.com"
    4. Edit deploy.php
    5. Change Admin PW
    6. Run
    ```sh
    $ dep deploy (production)
    ```
    7. Make changes on stage and ...
    ```sh
    $ dep pull (production)
    ```


### Updates

To update Wordpress:
    ```sh
    $ composer require johnpbloch/wordpress 5.2.x
    $ wp core update-db
    ```

Update Plugins:
    ```sh
    $ composer update
    ```

## Documentation

Bedrock documentation is available at [https://roots.io/bedrock/docs/](https://roots.io/bedrock/docs/).
Good Guide is available at [https://css-tricks.com/intro-bedrock-wordpress/](https://css-tricks.com/intro-bedrock-wordpress/).

## Contributing

Contributions are welcome from everyone. We have [contributing guidelines](https://github.com/roots/guidelines/blob/master/CONTRIBUTING.md) to help you get started.

## Bedrock sponsors

Help support our open-source development efforts by [becoming a patron](https://www.patreon.com/rootsdev).

<a href="https://kinsta.com/?kaid=OFDHAJIXUDIV"><img src="https://cdn.roots.io/app/uploads/kinsta.svg" alt="Kinsta" width="200" height="150"></a> <a href="https://k-m.com/"><img src="https://cdn.roots.io/app/uploads/km-digital.svg" alt="KM Digital" width="200" height="150"></a>

## Community

Keep track of development and community news.

* Participate on the [Roots Discourse](https://discourse.roots.io/)
* Follow [@rootswp on Twitter](https://twitter.com/rootswp)
* Read and subscribe to the [Roots Blog](https://roots.io/blog/)
* Subscribe to the [Roots Newsletter](https://roots.io/subscribe/)
* Listen to the [Roots Radio podcast](https://roots.io/podcast/)


## ToDo

* [Trellis Deployment Workflow](https://github.com/hamedb89/trellis-db-push-and-pull) [Docs](https://roots.io/trellis/docs/deploys/)
* Write own file-renaming-on-upload Plugin
* Add other Plugins too?
  * Mail project
  * Relevanssi
