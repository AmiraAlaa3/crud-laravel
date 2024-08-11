 <nav class="navbar navbar-expand-lg  navbar-dark bg-primary p-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">ITI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.index') }}">All Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tracks.index') }}">All Tracks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('courses.index') }}">All Courses</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>
