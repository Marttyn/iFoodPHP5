@if(count($errors))

    <div class="form-group">

        <div class="alert alert-danger">

            <ul>

                @foreach ($errors->all() as $error)

                    <li style="display: list-item;list-style-type: disc;">{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    </div>

@endif