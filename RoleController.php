// update user record
            $model->save();

            return redirect()->intended('admin/roles')->withSuccess('Role updated successfully');
        } else {
            $errors=$validator->errors()->messages();
            return redirect()->route('admin::role_edit', ['id' => $id])->with('errors',$errors);
        }
    }


    /**
     * Soft delete role record
     * @return Renderable
     */
    public function role_delete(Request $request, $id)
    {
        // fetching the user data wrt id
        $model= Role::find($id);

        // creating user data updation object
        $model->is_deleted = 1;
        
        // update user record
        $model->save();

        return redirect()->intended('admin/roles')->withSuccess('Role deleted successfully');
    }
}