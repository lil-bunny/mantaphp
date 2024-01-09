<label for="name">Area</label>
                                                                <small class="errorTxt2"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col s12 m6">
                                                        <div class="row">
                                                            <div class="col m6 s12">
                                                                <label for="Feedback">Feedback</label><br>
                                                                <p>{{ $feedback_data->feedback }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col s12 m6">
                                                        <div class="row">
                                                            <div class="col s12 input-field">
                                                                <select name="status">
                                                                    <option value="1" {{ $feedback_data->status==1 ? 'selected' : ''}}>Active</option>
                                                                    <option value="0" {{ $feedback_data->status==0 ? 'selected' : ''}}>Inactive</option>
                                                                </select>
                                                                <label>Status</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col s12 display-flex justify-content-end mt-3">
                                                        <button type="submit" class="btn indigo">Save changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- Admin Users Edit account form ends -->
                                        </div>
                                        
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        <!-- Admin Users Edit ends -->
                    </div>
                    <div class="content-overlay"></div>
                </div>
            </div>
        </div>
        <!-- END: Page Main-->
@endsection