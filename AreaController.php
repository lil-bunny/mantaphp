$site_dtl[$sitekey]['value']= $site_merit_value->id;
                    $site_dtl[$sitekey]['label']= $site_merit_value->title;
                }
            }
                   
        }

        $poi_data = [];
        if(!empty($area_data->gridTrends)) {
            foreach($area_data->gridTrends as $key => $value) {
                if($value != '0' && $value != '') {
                    $poi_data[$key]['value'] = $value;
                    $poi_data[$key]['label'] = ucwords(str_replace('_', ' ', $key));
                }
            }
        } 


        if (count($poi_data) > 0){

            echo "<pre>"; print_r($poi_data); exit;
        }
  
    }*/
}