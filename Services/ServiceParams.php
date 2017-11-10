<?php
/**
 * Created by PhpStorm.
 * User: cesar
 * Date: 03.11.17
 * Time: 10:40
 */

namespace Lengoo\MateCatBundle\Services;

use GuzzleHttp\Client;
use JMS\Serializer\SerializerBuilder;
use Lengoo\MateCatBundle\Model\Project;


trait ServiceParams
{
    private $host;
    private $port;
    private $api_path;
    private $private_tm_key;
    /**
     * @var Client
     */
    private $client;

    public function __construct($lengoo_matecat_host, $lengoo_matecat_port, $lengoo_matecat_private_tm_key)
    {
        $this->host = $lengoo_matecat_host;
        $this->port = $lengoo_matecat_port;
        $this->api_path = "/api";
        $this->private_tm_key = $lengoo_matecat_private_tm_key;
        // Create the client
        $this->client = new Client([
            "base_uri" => "$this->host:$this->port"
        ]);
    }

    /**
     * @return string
     */
    public function getPrivateTmKey()
    {
        return $this->private_tm_key;
    }

    /**
     * @param $obj Project The Project to be converted to a guzzle http request object
     * @return array The data ready to be send to matecat api.
     */
    private function normalizeData($obj)
    {
        $serializer = SerializerBuilder::create()->build();
        $obj_arr = json_decode($serializer->serialize($obj, 'json'), true);

        $data = [];
        foreach ($obj_arr as $k => $v) {

            if ($k == 'files') {
                for ($i = 0; $i < count($v); $i++) {
                    $data[] = [
                        'name' => "fileUpload$i",
                        'contents' => fopen($v[$i], 'r')
                    ];
                }
            } else {
                $data[] = [
                    'name' => $k,
                    'contents' => $v
                ];
            }
        }
        return $data;
    }
}