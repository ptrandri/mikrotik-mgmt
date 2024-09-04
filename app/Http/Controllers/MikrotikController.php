<?php

namespace App\Http\Controllers;

use App\Models\RouterosAPI;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class MikrotikController extends Controller
{
    private $ip = '172.16.12.15';
    private $username = 'admin';
    private $password = 'admin';

    public function index()
    {
        $API = new RouterosAPI();
        $API->debug('false');

        if ($API->connect($this->ip, $this->username, $this->password)) {

            $queues = $API->comm('/queue/simple/print');
            $firewallFilters = $API->comm('/ip/firewall/filter/print');
            $API->disconnect(); // Disconnect after fetching the data

            // dd ($firewallFilters);
            return view('mikrotik.index', compact('queues', 'firewallFilters'));


        } else {
            return "Connection Failed, Please make sure your device UP!";
        }
    }

    public function blockClient($clientIp)
    {
        $API = new RouterosAPI();
        $API->debug('false');

        if ($API->connect($this->ip, $this->username, $this->password)) {

            $existingRule = $API->comm('/ip/firewall/filter/print', [
                "?src-address" => $clientIp,
                "?action" => "drop",
            ]);

            // Add firewall filter rule to drop packets from client IP
            if (empty($existingRule)) {
            $API->comm('/ip/firewall/filter/add', [
                'chain' => 'forward',
                'src-address' => $clientIp,
                'action' => 'drop',
                'comment' => 'Blocked due to non-payment',
            ]);
            $API->disconnect(); // Disconnect after adding the rule
            return redirect()->back()->with('message', "Client $clientIp has been blocked.");

            } else {
                return redirect()->back()->with('message', "Client $clientIp is already blocked.");
            }
        } else {
            return "Connection Failed, Please make sure your device UP!";
        }

    }

    public function unblockClient($clientIp)
    {
        $API = new RouterosAPI();
        $API->debug('false');
    
        if ($API->connect($this->ip, $this->username, $this->password)) {
            // Check if the rule exists
            $existingRule = $API->comm('/ip/firewall/filter/print', [
                "?src-address" => $clientIp,
                "?action" => "drop",
            ]);
    
            if (!empty($existingRule)) {
                // If rule exists, remove it
                $API->comm('/ip/firewall/filter/remove', [
                    ".id" => $existingRule[0]['.id'],
                ]);
                $API->disconnect();
                return redirect()->back()->with('message', "Client $clientIp has been unblocked.");
            } else {
                $API->disconnect();
                return redirect()->back()->with('message', "Client $clientIp is not blocked.");
            }
        } else {
            return "Connection Failed, Please make sure your device UP!";
        }
    }
}