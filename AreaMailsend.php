$automotive_repair_and_maintenance_count=$poi_data['automotive_repair_and_maintenance_count']['value'];
                }  
                
            }


            fputcsv($myfilePath, array($area_info['id'], $area_data->site_location, $area_data->road_name, $area_data->title, $area_data->pin_code, $area_data->lat,$area_data->lng,$area_data->city->name,$area_data->state->name,$area_data->place_type,$area_data->media_formats,$area_data->orientation, $area_data->media_tags,$area_data->width,$area_data->height,$area_data->illumination,$area_data->ad_spot_durations,$area_data->ad_spot_per_second,$area_data->total_advertiser,$area_data->display_charge_pm,$area_data->production_cost,$area_data->installation_cost,$area_data->media_partner_name,$site_dtl[0]['label'],$site_dtl[1]['label'],$site_dtl[2]['label'],$site_dtl[3]['label'],$site_dtl[4]['label'], $gym_count,$cafe_count,$mall_count,$park_count,$nearest_city,$office_count,$others_count,$school_count,$grocery_count,$lodging_count,$area_affluence,$bus_stop_count,$hospital_count,$pharmacy_count,
            $market_presence,$office_presence,$pet_store_count,$total_POI_count,$warehouse_count,$pincode_category,$restaurant_count,$wholesaler_count,$bus_station_count,$cinema_hall_count,$event_venue_count,$liquor_shop_count,$other_store_count,$petrol_pump_count,$manufacturer_count,
            $sports_store_count,$travel_agent_count,$weekly_impressions,$doctor_clinic_count,$metro_station_count,$clothing_store_count,
            $footwear_store_count,$hardware_store_count,$market_concentration,$office_concentration,$police_station_count,
            $income_group_category,$jewellery_store_count,$nearest_city_distance,$railway_station_count,$religious_place_count,
            $beauty_and_salon_count,$monthly_average_income,$vegetable_market_count,$apartment_complex_count,$electronics_store_count,$nearest_cinema_distance,$nearest_school_distance,$nearest_airport_distance,$nearest_college_distance,$automotive_showroom_count,
            $nearest_bus_stop_distance,$nearest_religious_distance,$social_service_count_ngo,$average_daily_footfall_count,
            $college_and_university_count,$money_transfer_service_count,$mass_media_entertainment_count,$nearest_metro_station_distance,$nearest_shopping_mall_distance,$electronic_service_centre_count,$stationary_and_xerox_shop_count,$nearest_railway_station_distance,$average_daily_traffic_12am,$average_daily_traffic_12pm,$average_daily_traffic_6am,$average_daily_traffic_6pm,$automotive_repair_and_maintenance_count));
            
        }
        
        fclose($myfilePath);
        $content = "Please find the site details attached";
        Mail::send(['html' => 'mail'], ['content' => $content], function ($message){
            $message->subject("Site Details");
            $message->to("vineet.sharma@mantaray.in");
            $message->attach(public_path('application_files/area_export/araedtl.csv'));
        });

        $settings_data->send_site_dump = 'no';
        $settings_data->save();
        
        $this->info("Mail sent successfull from live");

        return true;
    }
}