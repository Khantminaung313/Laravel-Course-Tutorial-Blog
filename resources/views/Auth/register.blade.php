<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-5 mx-auto p-4">
                <h3 class="text-center text-primary">Register Form</h3>
                <div class="card m-4 p-3 py-4 shadow-sm">
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" required name="name"
                                value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" required name="username"
                                value="{{ old('username') }}">
                        </div>
                        @error('username')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" required name="email"
                                value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" required name="password"
                                value="{{ old('password') }}">
                        </div>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <button type="submit" class="btn btn-primary d-block mx-auto">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
