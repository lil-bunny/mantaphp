// fetching roles
        $roles = Role::where('is_deleted', '=', 0)
                            ->where('status', '=', 1)->get();
        
        // fetching user details
        $user_data = User::find($id);
                    
        return view('admin::user.edit', ['roles' => $roles, 'user_data' => $user_data]);
    }


    /**
     * Updates user record
     * @return Renderable
     */
    public function update_user(Request $request, $id)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'name' => 'required',
            'mobile' => 'required',
        ]);

        // fetching roles
        $roles = Role::where('is_deleted', '=', 0)
                            ->where('status', '=', 1)->get();
        
        if ($validator->passes()) {
            // fetching the user data wrt id
            $model= User::find($id);

            // creating user data updation array
            $model->full_name = $request->input('name');
            $model->email = $request->input('email');
            $model->mobile = $request->input('mobile');
            $model->role_id = $request->input('role_id');
            $model->status = $request->input('status');

            
            // checking if profile pic is uploaded or not
            if($request->profile_pic) {
                // picture upload
                $fileName = auth()->id() . '_' . time() . '.'. $request->profile_pic->extension();  
                $type = $request->profile_pic->getClientMimeType();
                $size = $request->profile_pic->getSize();
                $request->profile_pic->move(public_path('application_files/user_images'), $fileName);
                $model->image = $fileName;
            }
            
            // checking if password is set or not
            if($request->input('password')) {
                $model->password = bcrypt($request->input('password'));
            }

            // update user record
            $model->save();

            return redirect()->intended('admin/users')->withSuccess('User updated successfully');
        } else {
            // fetching roles
            $roles = Role::where('is_deleted', '=', 0)
                            ->where('status', '=', 1)->get();

            $errors=$validator->errors();
            return redirect()->route('admin.user_edit', ['id' => $id])->with('errors',$errors)->with('roles',$roles);
        }
    }


    /**
     * Soft delete user record
     * @return Renderable
     */
    public function user_delete(Request $request, $id)
    {
        // fetching the user data wrt id
        $model= User::find($id);

        // creating user data updation object
        $model->is_deleted = 1;
        
        // update user record
        $model->save();

        return redirect()->intended('admin/users')->withSuccess('User deleted successfully');
    }
}