<?php
include 'Post.php';
use\wp;
class PostSeeder {
    // add Post data
    public static function seed() {
        // add Post data
        $posts = [];
        $posts[] = new Post("BOB", "Halt0", date("h:i:sa"), "https://www108.griffith.edu.au/gatekeeper-api/photostore/v1/fetch/s57if7crg5eapk91c9g7idjbdyg1fe4iha4kh5dwcv3351mf6h8c31nz91o3hy1qtr5ftx9175gbaywffgis5ix37kiv3gpmbr3qrny");
        $posts[] = new Post("HARRY", "Hello", date("h:i:sa"), "https://www108.griffith.edu.au/gatekeeper-api/photostore/v1/fetch/s57if7crg5eapk91c9g7idjbdyg1fe4iha4kh5dwcv3351mf6h8c31nz91o3hy1qtr5ftx9175gbaywffgis5ix37kiv3gpmbr3qrny");
        return $posts;
    }
}
?>