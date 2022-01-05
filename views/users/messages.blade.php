@extends('layouts.header')

@section('content')
<div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Direct Chat</h3>

              <div class="box-tools pull-right">
                <span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>
                
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                  <i class="fa fa-comments"></i></button>
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                @foreach($sentmessages as $sent)
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">{{ Auth::user()->name }}</span>
                    <span class="direct-chat-timestamp pull-right"></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    {{$sent->message}}
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                @endforeach
                <!-- /.direct-chat-msg -->

                @foreach($recieved as $message)
                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right"></span>
                    <span class="direct-chat-timestamp pull-left">{{$sent->sender_id}}</span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image">  
                  <div class="direct-chat-text">
                    {{ $message->message }}
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                @endforeach
                <!-- /.direct-chat-msg -->
              </div>
              <!--/.direct-chat-messages-->

              <!-- Contacts are loaded here -->
              
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <form action="{{ url('/sendmesssage') }}" method="POST">
                @csrf
                <div class="input-group">
                  <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" placeholder="Type Message ..." class="form-control">
                  <input type="hidden" name="sender_id" value="{{ Auth::user()->id }}" placeholder="Type Message ..." class="form-control">
                  <select name="receiver_id" class="form-control select2" required style="width: 100%;">
                    @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                  <span class="contacts-list-msg">{{$user->user_type}}</span>
                  @endforeach
                  
                </select>
                <div>
                  
                </div>
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat">Send</button>
                      </span>
                </div>
              </form>
            </div>
            <!-- /.box-footer-->
          </div>

@endsection