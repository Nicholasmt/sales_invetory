@component('mail::message')
# Hello <span class="text">{{$employee->name}}</span>


Your Account has been created Successfully!, Below is your Email Address and Login Key.

<h4> <span class="text">{{$employee->email}}</span> </h4>
<h4> <span class="text">{{$randomPass}}</span> </h4>

<p>click the link below to Access your account</p>

<code class="bold">Note: <span>Remember to Update your Key Code Thank you.</span> </code>

@component('mail::button', ['url' => url('/')])
click Here
@endcomponent

Thanks,<br>
Company name .
@endcomponent

<style>
    .text{
        font-size:20px;
        font-weight:bolder;
        color:#1666ac;
    }
    .bold
    {
        font-weight:bolder; 
    }
</style>
