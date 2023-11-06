<form action="{{route('set_language_locale', $lang)}}" method="POST">
    @csrf
    <button type="submit" style="background-color: rgba(0, 0, 255, 0)" class="m-0 p-0 border border-0">
        <span class="flag-icon flag-icon-{{$nation}}"></span>
    </button>
</form>