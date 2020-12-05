@if($errors->any())
<div class="alert alert-danger mt-5 p-3">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <script>
        function hideButton() {
            var btn = document.getElementById('hideBtn');
            btn.parentElement.style.visibility = 'hidden';
        }
    </script>
    <button id="hideBtn" class="btn btn-dark" style="vertical-align: middle; margin-left:690px" onclick="hideButton()">X</button>
</div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    <script>
        function hideButton() {
            var btn = document.getElementById('hideBtn');
            btn.parentElement.style.visibility = 'hidden';
        }
    </script>
<button id="hideBtn" class="btn btn-dark" style="vertical-align: middle; margin-left:690px" onclick="hideButton()">X</button>
@endif

@if(session('error'))
<div  class="alert alert-danger mt-5 p-3">
    {{ session('error') }}
    <script>
        function hideButton() {
            var btn = document.getElementById('hideBtn');
            btn.parentElement.style.visibility = 'hidden';
        }
    </script>
    <button id="hideBtn" class="btn btn-dark" style="vertical-align: middle; margin-left:690px" onclick="hideButton()">X</button>
</div>
@endif

