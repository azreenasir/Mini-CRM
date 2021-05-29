
    <div class="form-group">
        <input type="file" name="logo" id="logo" >
        @error('logo')
            <div class="mt-2 text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="form-group">
        <Label for="name">Company Name</Label>
        <input type="text" value="{{ old('name') ?? $company->name}}" name="name" id="name" class="form-control" required>
        @error('name')
            <div class="mt-2 text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    
    <div class="form-group">
        <Label for="email">Company Email</Label>
        <input type="email" value="{{ old('email') ?? $company->email}}" name="email" id="email" class="form-control" required>
        @error('email')
            <div class="mt-2 text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <Label for="website">Company Website</Label>
        <input type="website" value="{{ old('website') ?? $company->website}}" name="website" id="website" class="form-control" required>
        @error('website')
            <div class="mt-2 text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <br>
    <button type="submit" class="btn btn-primary">{{ $submit ?? 'Update' }}</button>
