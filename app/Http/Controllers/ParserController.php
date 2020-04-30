<?php

namespace App\Http\Controllers;

use duzun\hQuery;
use App\Models\Ads;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function index() {
//       now we will generate links , that will be parsed
        $basic_url = 'https://realt.by';
        $cities =  City::get();
        foreach ($cities as $city) {
            $categories = Category::get();
            foreach ($categories as $category){
                $link = $basic_url."/".$city->city_in_url."/".$category->category_in_url;
                $doc = hQuery::fromUrl($link, ['Accept' => 'text/html,application/xhtml+xml;q=0.9,*/*;q=0.8']);
//                check the number of pages and if there are more than 1, we generate other links
                $paginate_container = $doc->find('div.uni-paging:last');
                if($paginate_container) {
                    $count_page = trim($paginate_container->find('a:last')->text());
                }
                if($count_page > 1){
                    for($i=1;$i<$count_page;$i++){
//                        if this first page - we don't change link
                        if($i==1){
                            $divs = $doc->find('div.bd-item');
                            if ($divs) {
                                foreach ($divs as $div) {
                                    $title = trim($div->find('div.title a')->text());
                                    $img_url = trim($div->find('div.bd-item-left-top img')->attr('src'));
                                    if($div->find('div.bd-item-left-bottom span.price-byr')) {
                                        $price = trim($div->find('div.bd-item-left-bottom span.price-byr')->text());
                                    }
                                    if($div->find('div.bd-item-right-center p')){
                                        $description = trim($div->find('div.bd-item-right-center p')->text());
                                    }
//                                    insert data in table
                                    Ads::create([
                                        'title' => $title,
                                        'img_url' => $img_url,
                                        'text' => $description,
                                        'price' => $price,
                                        'category_id' => $category->id,
                                        'city_id' => $city->id,
                                    ]);
                                }
                            }
                        } else {
//                        if this not first page - we add in link number of page
                            $count_page_in_site = $i - 1;
                            $new_link = $link."?page=".$count_page_in_site;
                            $doc = hQuery::fromUrl($new_link, ['Accept' => 'text/html,application/xhtml+xml;q=0.9,*/*;q=0.8']);
                            if ($doc) {
                                $divs = $doc->find('div.bd-item');
                                if ($divs) {
                                    foreach ($divs as $div) {
                                        $title = trim($div->find('div.title a')->text());
                                        $img_url = trim($div->find('div.bd-item-left-top img')->attr('src'));
                                        if($div->find('div.bd-item-left-bottom span.price-byr')) {
                                            $price = trim($div->find('div.bd-item-left-bottom span.price-byr')->text());
                                        }
                                        if($div->find('div.bd-item-right-center p')){
                                            $description = trim($div->find('div.bd-item-right-center p')->text());
                                        }
//                                    insert data in table
                                        Ads::create([
                                            'title' => $title,
                                            'img_url' => $img_url,
                                            'text' => $description,
                                            'price' => $price,
                                            'category_id' => $category->id,
                                            'city_id' => $city->id,
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                } else {
                    dd(1);
                    $divs = $doc->find('div.bd-item');
                    if ($divs) {
                        foreach ($divs as $div) {
                            $title = trim($div->find('div.title a')->text());
                            $img_url = trim($div->find('div.bd-item-left-top img')->attr('src'));
                            if($div->find('div.bd-item-left-bottom span.price-byr')) {
                                $price = trim($div->find('div.bd-item-left-bottom span.price-byr')->text());
                            }
                            if($div->find('div.bd-item-right-center p')){
                                $description = trim($div->find('div.bd-item-right-center p')->text());
                            }
//                                    insert data in table
                            Ads::create([
                                'title' => $title,
                                'img_url' => $img_url,
                                'text' => $description,
                                'price' => $price,
                                'category_id' => $category->id,
                                'city_id' => $city->id,
                            ]);
                        }
                    }
                }

            }
        }
        return view('content');
    }

}
