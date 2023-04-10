<?php namespace App\Http\Controllers;

use App\Models\Product;

class UploadImageController extends Controller
{

  public $items;



  public function exportImageNullProduct()
  {
        // $r= Product::whereNull('image')->get();
        // $posts = [];
        // foreach($r as $e){
        //     $t = [
        //         "Id"=> $e->id,
        //         "Image" => null,
        //         "Name"=> $e->name
        //     ];
        //     $posts[] = $t;
        // }

        // $fp = fopen(__DIR__.'/results.json', 'w');
        // fwrite($fp, json_encode($posts));
        // fclose($fp);
  }

  public function __construct()
  {
    $path = __DIR__. "/products.json";

    $this->items = json_decode(file_get_contents($path), true);

  }

  public function imageDownload(array $data)
  {
    if( !$this->isImage($data) )
        return false;

    $ex = pathinfo($data['image'], PATHINFO_EXTENSION);
    $name = "{$data['id']}.{$ex}";
    //$path = public_path('products/') . $name;
    $path = public_path('images/products/') . $name;
    $url = @file_put_contents( $path, file_get_contents($data['image']));
    if (!$url) {
        return false;
    }

    return $name;
  }


  public function isImage(array $data): bool
  {
    return (bool)(!empty($data['image'])) ;
  }


  public function removeBg(string $path)
  {
    $client = new \GuzzleHttp\Client();
    return $client->post('https://api.remove.bg/v1.0/removebg', [
        'multipart' => [
            [
                'name'     => 'image_url',
                'contents' => "https://shopjozi.ir/products/{$path}"
            ],
            [
                'name'     => 'size',
                'contents' => 'auto'
            ]
        ],
        'headers' => [
            'X-Api-Key' => 'mGQvLdGnehSHmzbnxSKa6QTe'
        ]
    ]);
  }


  public function uploadeImage()
    {

        foreach($this->items as $i => $product){

            if( !$this->isImage($product) ){
                unset($this->items[$i]);
                $path = __DIR__. "/products.json";
                $fp = fopen($path, 'w');
                fwrite($fp, json_encode($this->items));
                fclose($fp);
                continue;
            }


            // $image = $this->imageDownload($product);
            // if(!$image){
            //     unset($this->items[$i]);
            //     $path = __DIR__. "/products.json";
            //     $fp = fopen($path, 'w');
            //     fwrite($fp, json_encode($this->items));
            //     fclose($fp);
            //     continue;
            // }

            // $res = $this->removeBg($image);


            // $path = "/images/products/{$image}";
            // $fp = fopen(public_path() . $path, "wb");
            // fwrite($fp, $res->getBody());
            // fclose($fp);

            $product2 = Product::where('erp_code', $product['erp_code'])->first();

            // $product->image = "/images/products/{$image}";
            $product2->image = $product['image'];
            // $product2->save();

            if ($product2->save()){
                unset($this->items[$i]);
                $path = __DIR__. "/products.json";
                $fp = fopen($path, 'w');
                fwrite($fp, json_encode($this->items));
                fclose($fp);
            }

        }
    }





}
