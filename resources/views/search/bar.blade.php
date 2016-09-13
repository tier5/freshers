<form class="form" role="search" method="get" action="{{ route('search') }}">
    <div class="input-group stylish-input-group prefetch">
        <input type="serach" class="form-control typeahead tt-query" placeholder="Search" autocomplete="off" spellcheck="false" name="_query" />
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
