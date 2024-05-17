{!! $show !!}

{!! $showOwner !!}

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Fill the form and send mail</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.sentownermail') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Detail</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Duration of the Walk 
                                        <input type="hidden" name="dog_id" value="{{ $dogId }}">
                                        <input type="hidden" name="appointment_id" value="{{ $appointment_id }}"></td>
                                    <td><input type="text" name="duration" class="form-control"
                                            placeholder="Duration of the walk in minutes" required></td>
                                </tr>
                                <tr>
                                    <td>Route Taken</td>
                                    <td><input type="text" name="route" class="form-control"
                                            placeholder="Description of the route taken" required></td>
                                </tr>
                                <tr>
                                    <td>Behavior During the Walk</td>
                                    <td><textarea name="behavior" class="form-control"
                                            placeholder="Description of the dog's behavior during the walk"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Interaction with Other Dogs</td>
                                    <td><textarea name="interaction" class="form-control"
                                            placeholder="Description of interactions with other dogs"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Toilet Breaks</td>
                                    <td><textarea name="toilet_breaks" class="form-control"
                                            placeholder="Details of any toilet breaks taken"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Environmental Conditions</td>
                                    <td><textarea name="environmental_conditions" class="form-control"
                                            placeholder="Description of environmental conditions during the walk"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Health Observations</td>
                                    <td><textarea name="health_observations" class="form-control"
                                            placeholder="Observations about the dog's health"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Hydration</td>
                                    <td><textarea name="hydration" class="form-control"
                                            placeholder="Details about the dog's hydration"></textarea></td>
                                </tr>
                                <tr>
                                    <td>General Observations</td>
                                    <td><textarea name="general_observations" class="form-control"
                                            placeholder="Any other general observations"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Photos or Videos</td>
                                    <td><input type="file" name="media" class="form-control-file"
                                            accept="image/*,video/*" placeholder="Upload photos or videos"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Send mail</button>
                </form>
            </div>
        </div>
    </div>
</div>
