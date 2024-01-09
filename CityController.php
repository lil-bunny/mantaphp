/**
     * Updates city record
     * @return Renderable
     */
    public function update_city(Request $request, $id)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'state_id' => 'required',
        ]);

        // fetching roles
        $states = State::where('is_deleted', '=', 0)
                            ->where('status', '=', 1)->get();
        
        if ($validator->passes()) {
            // fetching the city data wrt id
            $model= City::find($id);

            // creating city data updation array
            $model->state_id = $request->input('state_id');
            $model->name = $request->input('name');
            $model->status = $request->input('status');

            // checking if profile pic is uploaded or not
            if($request->city_pic) {
                // picture upload
                $fileName = auth()->id() . '_' . time() . '.'. $request->city_pic->extension();  
                $type = $request->city_pic->getClientMimeType();
                $size = $request->city_pic->getSize();
                $request->city_pic->move(public_path('application_files/city'), $fileName);
                $model->image = $fileName;
            }

            // update user record
            $model->save();

            return redirect()->intended('admin/cities')->withSuccess('City updated successfully');
        } else {
            // fetching states
            $states = State::where('is_deleted', '=', 0)
                            ->where('status', '=', 1)->get();

            $errors=$validator->errors();
            return redirect()->route('admin.city_edit', ['id' => $id])->with('errors',$errors);
        }
    }


    /**
     * Soft delete city record
     * @return Renderable
     */
    public function city_delete(Request $request, $id)
    {
        // fetching the city data wrt id
        $model= City::find($id);

        // creating city data updation object
        $model->is_deleted = 1;
        
        // update city record
        $model->save();

        return redirect()->intended('admin/cities')->withSuccess('City deleted successfully');
    }
}