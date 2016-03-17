<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class JsonController extends Controller
{
    public function JsonSuccess($msg = 'success')
    {
        return new JsonResponse(
            array(
                'success' => true,
                'msg' => $msg
            )
        );
    }

    public function JsonFail($msg = 'fail')
    {
        return new JsonResponse(
            array(
                'success' => false,
                'msg' => $msg
            ), 500
        );
    }

    public function JsonData($data = null, $count = false)
    {
        if ($count)
        {
            return new JsonResponse(
                array(
                    'success' => true,
                    'data' => $data,
                    'count' => intval($count)
                )
            );
        } else
        {
            return new JsonResponse(
                array(
                    'success' => true,
                    'data' => $data
                )
            );
        }

    }
}