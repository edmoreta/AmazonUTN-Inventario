@if ($message = Session::get('success'))

    <div class="alert alert-info">          
            <p>
              <strong>{{ $message }}</strong>
            </p>
     </div>
 @endif
 @if ($message = Session::get('errores'))

    <div class="alert alert-danger">          
        <strong><p>Error</p></strong>
        <ul>         
           <li>
               {{$message }}
           </li>        
        </ul>
     </div>
 @endif
 @if ($message = Session::get('error_prov'))
 <div class="alert alert-danger">
        <strong><p>Error</p></strong>
        <ul>         
           <li>
               {{$message }}
           </li>        
        </ul>
    </div>
 @endif
@if(count($errors)>0)

     <div class="alert alert-danger">
         <strong><p>Error</p></strong>
         <ul>
          @foreach($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
          @endforeach
         </ul>
     </div>

@endif

