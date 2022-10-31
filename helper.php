    public function lineNotification($token="your token", $message="Hello Marse!"){
        $method = 'POST';
        $url = "https://notify-api.line.me/api/notify";
        $data = ['message' => $message];
        $headers = [
            "content-type: multipart/form-data",
            "Authorization: Bearer {$token}"
        ];

        try{
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0); 
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            $result = curl_exec($curl);
            curl_close($curl);

            return $result;
         }catch(\Exception $ex) {
            return $ex->getMessage();
         }
     }
