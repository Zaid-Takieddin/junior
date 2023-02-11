<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TeacherCertificate;
use App\Http\Requests\StoreTeacherCertificateRequest;
use App\Http\Requests\UpdateTeacherCertificateRequest;
use App\Http\Resources\TeacherCertificateCollection;
use App\Http\Resources\TeacherCertificateResource;
use Illuminate\Support\Facades\Storage;

class TeacherCertificateController extends Controller
{
    private $FOLDER = 'teacherCertificates';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TeacherCertificateCollection(TeacherCertificate::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeacherCertificateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherCertificateRequest $request)
    {
        $certificate = $request->file('certificate');
        $certificateName = time() . '.' . $certificate->extension();
        $certificate->storeAs('public/' . $this->FOLDER . '/' . $request->input('teacher_id'), $certificateName);

        return new TeacherCertificateResource(TeacherCertificate::create([
            'teacher_id' => $request->teacher_id,
            'certificate' => asset('storage/' . $this->FOLDER . '/' . $request->input('teacher_id') . '/' . $certificateName)
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeacherCertificate  $teacherCertificate
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherCertificate $teacherCertificate)
    {
        return new TeacherCertificateResource($teacherCertificate->loadMissing('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherCertificate  $teacherCertificate
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherCertificate $teacherCertificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeacherCertificateRequest  $request
     * @param  \App\Models\TeacherCertificate  $teacherCertificate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherCertificateRequest $request, TeacherCertificate $teacherCertificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherCertificate  $teacherCertificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherCertificate $teacherCertificate)
    {
        if (Storage::disk('public')->delete($this->FOLDER . '/' . $teacherCertificate->id . '/' .  basename($teacherCertificate->certificate))) {
            return $teacherCertificate->deleteOrFail();
        } else {
            return 'certificate not found';
        }
    }
}
