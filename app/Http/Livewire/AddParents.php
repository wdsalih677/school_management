<?php

namespace App\Http\Livewire;

use App\Models\nationalities\Nationalitie;
use Illuminate\Support\Facades\Hash;
use App\Models\bloods\Blood;
use App\Models\parents\StuParent;
use App\Models\religions\Religion;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class AddParents extends Component
{
    use WithFileUploads;
    public $currentStep = 1 ,$catchError ,$successMessage ,$photos,
    // Father_INPUTS
    $Email, $Password,
    $Name_Father, $Name_Father_en,
    $National_ID_Father, $Passport_ID_Father,
    $Phone_Father, $Job_Father, $Job_Father_en,
    $Nationality_Father_id, $Blood_Type_Father_id,
    $Address_Father, $Religion_Father_id,

    // Mother_INPUTS
    $Name_Mother, $Name_Mother_en,
    $National_ID_Mother, $Passport_ID_Mother,
    $Phone_Mother, $Job_Mother, $Job_Mother_en,
    $Nationality_Mother_id, $Blood_Type_Mother_id,
    $Address_Mother, $Religion_Mother_id;

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName, [
    //         'Email' => 'required|email',
    //         'National_ID_Father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
    //         'Passport_ID_Father' => 'min:10|max:10',
    //         'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    //         'National_ID_Mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
    //         'Passport_ID_Mother' => 'min:10|max:10',
    //         'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
    //     ]);
    // }
    public function render()
    {
        try{
            $nationalities = Nationalitie::get();
            $bloods = Blood::get();
            $religions = Religion::get();
            return view('livewire.stu-parents.add-parents', compact('nationalities','bloods','religions'));
        }catch(\Exception $e){
            return $e;
        }
    }
    public function submitForm(){
        try{
            $stu_parent = new StuParent();
            $stu_parent->email = $this->Email;
            $stu_parent->password = Hash::make($this->Password);
            $stu_parent->fa_name  = ['en'=> $this->Name_Father_en , 'ar'=>$this->Name_Father];
            $stu_parent->mo_name  = ['en'=> $this->Name_Mother_en , 'ar'=>$this->Name_Mother];
            $stu_parent->fa_job   = ['en'=> $this->Job_Father_en , 'ar'=>$this->Job_Father];
            $stu_parent->mo_job   = ['en'=> $this->Job_Mother_en , 'ar'=>$this->Job_Mother];
            $stu_parent->fa_passport_id = $this->Passport_ID_Father;
            $stu_parent->mo_passport_id = $this->Passport_ID_Mother;
            $stu_parent->fa_national_id = $this->National_ID_Father;
            $stu_parent->mo_national_id = $this->National_ID_Mother;
            $stu_parent->fa_phone = $this->Phone_Father;
            $stu_parent->mo_phone = $this->Phone_Mother;
            $stu_parent->fa_blood_id  = $this->Blood_Type_Father_id;
            $stu_parent->mo_blood_id   = $this->Blood_Type_Mother_id;
            $stu_parent->fa_nationality_id    = $this->Nationality_Father_id;
            $stu_parent->mo_nationality_id    = $this->Nationality_Mother_id;
            $stu_parent->fa_religion_id     = $this->Religion_Father_id;
            $stu_parent->mo_religion_id     = $this->Religion_Mother_id ;
            $stu_parent->fa_address     = $this->Address_Father ;
            $stu_parent->mo_address     = $this->Address_Mother ;
            $stu_parent->save();
            if (!empty($this->photos)){
                foreach ($this->photos as $photo) {
                    $photo->storeAs( 'app/parent_attachments/'.$this->National_ID_Father.'/'. $photo->getClientOriginalName(),);
                    DB::table('parent_attachment')->create([
                        'name' => $photo->getClientOriginalName(),
                        'parent_id' => $stu_parent->id,
                    ]);
                }
            }
            $this->reset();
            $this->successMessage = trans('main_trans.add_success');
            $this->currentStep = 1;
        }
        catch(\Exception $e){
            $this->catchError = $e->getMessage();
            dd($this->catchError);
            
        }
    }
    public function firstStepSubmit(){
        // $this->validate([
        //     'Email' => 'required|unique:stu_parents,Email,'.$this->id,
        //     'Password' => 'required',
        //     'Name_Father' => 'required',
        //     'Name_Father_en' => 'required',
        //     'Job_Father' => 'required',
        //     'Job_Father_en' => 'required',
        //     'National_ID_Father' => 'required|unique:stu_parents,National_ID_Father,' . $this->id,
        //     'Passport_ID_Father' => 'required|unique:stu_parents,Passport_ID_Father,' . $this->id,
        //     'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        //     'Nationality_Father_id' => 'required',
        //     'Blood_Type_Father_id' => 'required',
        //     'Religion_Father_id' => 'required',
        //     'Address_Father' => 'required',
        // ]);
        $this->currentStep = 2;

    }

    public function secondStepSubmit(){
        // $this->validate([
        //     'Name_Mother' => 'required',
        //     'Name_Mother_en' => 'required',
        //     'National_ID_Mother' => 'required|unique:stu_parents,National_ID_Mother,' . $this->id,
        //     'Passport_ID_Mother' => 'required|unique:stu_parents,Passport_ID_Mother,' . $this->id,
        //     'Phone_Mother' => 'required',
        //     'Job_Mother' => 'required',
        //     'Job_Mother_en' => 'required',
        //     'Nationality_Mother_id' => 'required',
        //     'Blood_Type_Mother_id' => 'required',
        //     'Religion_Mother_id' => 'required',
        //     'Address_Mother' => 'required',
        // ]);
        $this->currentStep = 3;

    }

    public function back($step){

        $this->currentStep = $step;

    }
}
