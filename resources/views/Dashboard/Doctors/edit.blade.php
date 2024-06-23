<!-- Modal -->
<div class="modal fade" id="edit{{ $doctor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/sections_trans.edit_sections')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="{{ route('Doctors.update',$doctor->id) }}" method="post" autocomplete="off">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">{{trans('Dashboard/sections_trans.name_sections')}}</label>
                    <input type="hidden" name="id" value="{{ $doctor->id }}">
                    <input type="text" name="name" value="{{ $doctor->name }}" class="form-control">

                    <label for=""></label>
                    <select name="section_id" id="sections" class="form-control">
                        <option value="#" disabled selected>Choose Section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>

                    <label for=""></label>
                    <select name="appointments" id="appointments" class="form-control">
                        <option value="#" disabled selected>Choose Day</option>
                        @foreach ($appointments as $key=>$appointment)
                            <option value="{{ $appointment }}">{{ $appointment }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/sections_trans.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Dashboard/sections_trans.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>