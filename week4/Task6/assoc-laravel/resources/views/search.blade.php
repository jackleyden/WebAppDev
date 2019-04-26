@extends('layouts.main')

@section('title')
  search result
@endsection

@section('content')

Searched for 
@forelse ($get as $search)
{{$search}},
@empty
@endforelse
<br><br>
<?php $state = true;?>
    <table class="bordered">
            <!-- table header -->
        @forelse ($PM as $Pm)
        
        <?php if ($state == true){?>
        <tr>
            @forelse ($Pm as $name => $value)
                
                    <th>{{$name}}</th>
                
            @empty
                No URL Var
            @endforelse
            </tr>
            <?php } ?>
            
            <?php if($state == true){
                $state = false;
            }?>
            <tr>
            @forelse ($Pm as $name => $value)
                <td>{{$value}}</td>
            @empty
                No URL Var
            @endforelse
            </tr>
            
        @empty
        No URL Var
        @endforelse
            </table>
@endsection