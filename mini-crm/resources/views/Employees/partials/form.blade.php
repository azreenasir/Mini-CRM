    
    <div class="form-group">
        <Label for="firstname">First Name</Label>
        <input type="text" value="{{ old('firstname') ?? $employee->firstname}}" name="firstname" id="firstname" class="form-control" required>
        @error('firstname')
            <div class="mt-2 text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <Label for="lastname">Last Name</Label>
        <input type="text" value="{{ old('lastname') ?? $employee->lastname}}" name="lastname" id="lastname" class="form-control" required>
        @error('lastname')
            <div class="mt-2 text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    
    <div class="form-group">
        <Label for="email">Email</Label>
        <input type="email" value="{{ old('email') ?? $employee->email}}" name="email" id="email" class="form-control" required>
        @error('email')
            <div class="mt-2 text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <Label for="phone">Phone Number</Label>
        <input type="phone" value="{{ old('phone') ?? $employee->phone}}" name="phone" id="phone" class="form-control" required>
        @error('phone')
            <div class="mt-2 text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="company">Company Name</label>
        <select name="company" id="company" style="border-radius: 5px; width:480px; height:40px">
            @foreach ($companies as $company)
            <option {{ $company->id == $employee->company_id ? 'selected': ''}} value="{{ $company->id }}"> {{ $company->name }}</option>
            @endforeach
        </select>
        @error('company')
            <div class="mt-2 text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>



    <br>
    <button type="submit" class="btn btn-primary">{{ $submit ?? 'Update' }}</button>
