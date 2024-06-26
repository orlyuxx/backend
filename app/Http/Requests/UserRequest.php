<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array  
    {
        if( request()->routeIS('user.login') ) {
            return [
                'email'         => 'required|string|email|max:255',
                'password'      => 'required|min:8',
            ];
        }
        else if( request()->routeIS('user.store') ) {
            return [
                'firstname'     => 'required|string|min:5',
                'lastname'      => 'required|string|max:255',
                'email'         => 'required|string|email|unique:App\Models\User,email|max:255',
                'password'      => 'required|min:8|confirmed',
                'gender'        => 'required|max:255|string',
                'address'       => 'required|max:255|string',
                'birthdate'     => 'nullable|date',
            ];
        }
        else if( request()->routeIS('user.update') ) {
            return [
                'name'          => 'required|string|max:255',
            ];
        }
        else if( request()->routeIS('user.email') ) {
            return [
                'email'         => 'required|string|email|max:255',
            ];
        }
        else if( request()->routeIS('user.password') ) {
            return [
                'password'      => 'required|confirmed|min:8',
            ];
        }
        else if( request()->routeIS('user.image') || request()->routeIS('profile.image')) {
            return [    
                'image'         => 'required|image|mimes:jpg,bpm,png|max:2048',
            ];
        }
    } 
}
