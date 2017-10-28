<?php
/**
 * This file is part of the powerocomponentsdemo package.
 *
 * (c) Eddilbert Macharia (http://eddmash.com)<edd.cowan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Models\Entry;
use Eddmash\PowerOrm\Serializer\Json;
use Eddmash\PowerOrm\Serializer\SimpleObjectSerializer;

require_once "header.php"; ?>

    <div class="jumbotron">`
        <h1>Welcome You</h1>
        <p>A simple blog system that show case some usage of the
            <strong>powerorm</strong> and <strong>powerform</strong> components</p>

        <p>
            You can also use powerormfaker to generate data if your lazy.
            on the comand line just run
            <small><code>vendor/bin/pmanager generatedata</code></small>
        </p>

        <p>View Queries performed on the toolbar at the bottom of the page.</p>
    </div>


<?php
require_once "footer.php";
