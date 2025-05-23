<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReferenseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            // Reference fields
            'ref_no' => 'required|string',
            'completed_by' => 'nullable|string',
            'completed_date' => 'nullable|date',
            'folder' => 'nullable|string',
            'is_archived' => 'nullable|boolean',
            'status' => 'required|string',
            'custom_status' => 'nullable|string',
            'templatedivision' => 'nullable|string',
            'division_id' => 'nullable|integer',
            'time' => 'nullable|string',
            'project_manager_contact' => 'nullable|string',
            'project_manager_email' => 'nullable|email',
            'project_manager_mobile' => 'nullable|string',

            // ReferenceClient nested fields
            'client' => 'required|array',
            'client.client' => 'required|string',
            'client.client_contact' => 'nullable|string',
            'client.client_phone_code' => 'nullable|string',
            'client.client_phone' => 'nullable|string',
            'client.client_email' => 'nullable|email',
            'client.client_mobile_code' => 'nullable|string',
            'client.client_mobile' => 'nullable|string',
            'client.client_street' => 'nullable|string',
            'client.client_suburb' => 'nullable|string',
            'client.client_postcode' => 'nullable|string',
            'client.client_state' => 'nullable|string',
            'client.client_country' => 'nullable|string',
            'client.client_abn' => 'nullable|string|max:50',
            'client.client_department' => 'nullable|string',
            'client.client_position' => 'nullable|string',

            // ReferenceProject nested fields
            'project' => 'required|array',
            'project.project' => 'required|string',
            'project.project_contact' => 'nullable|string',
            'project.project_phone_code' => 'nullable|string',
            'project.project_phone' => 'nullable|string',
            'project.project_email' => 'nullable|email',
            'project.project_mobile_code' => 'nullable|string',
            'project.project_mobile' => 'nullable|string',
            'project.project_street' => 'nullable|string',
            'project.project_suburb' => 'nullable|string',
            'project.project_postcode' => 'nullable|string',
            'project.project_state' => 'nullable|string',
            'project.project_country' => 'nullable|string',
            'project.project_loading_dock_details' => 'nullable|string',
            'project.service_id' => 'nullable|integer',
            'project.operation' => 'nullable|string',
            'project.bams_security_contact' => 'nullable|string',
            'project.bams_security_email' => 'nullable|email',
            'project.bams_security_mobile' => 'nullable|string',

            // ReferenceClientRep nested fields
            'peferenceClientRep' => 'array',
            'peferenceClientRep.client_rep' => 'nullable|string',
            'peferenceClientRep.client_rep_contact' => 'nullable|string',
            'peferenceClientRep.client_recp_phone_code' => 'nullable|string',
            'peferenceClientRep.client_rep_phone' => 'nullable|string',
            'peferenceClientRep.client_rep_email' => 'nullable|string',
            'peferenceClientRep.client_recp_mobile_code' => 'nullable|string',
            'peferenceClientRep.client_rep_mobile' => 'nullable|string',
            'peferenceClientRep.client_rep_street' => 'nullable|string',
            'peferenceClientRep.client_rep_suburb' => 'nullable|string',
            'peferenceClientRep.client_rep_postcode' => 'nullable|string',
            'peferenceClientRep.client_rep_state' => 'nullable|string',
            'peferenceClientRep.client_rep_country' => 'nullable|string',

            // ReferenceClientRep nested fields
            'referencePaymentDetail' => 'array',
            'referencePaymentDetail.ref_id' => 'nullable|string',
            'referencePaymentDetail.client_rep' => 'nullable|string',
            'referencePaymentDetail.client_rep_contact' => 'nullable|string',
            'referencePaymentDetail.client_recp_phone_code' => 'nullable|string',
            'referencePaymentDetail.client_rep_phone' => 'nullable|string',
            'referencePaymentDetail.client_rep_email' => 'nullable|string',
            'referencePaymentDetail.client_recp_mobile_code' => 'nullable|string',
            'referencePaymentDetail.client_rep_mobile' => 'nullable|string',
            'referencePaymentDetail.client_rep_street' => 'nullable|string',
            'referencePaymentDetail.client_rep_suburb' => 'nullable|string',
            'referencePaymentDetail.client_rep_postcode' => 'nullable|string',
            'referencePaymentDetail.client_rep_state' => 'nullable|string',
            'referencePaymentDetail.client_rep_country' => 'nullable|string',

            // ReferenceLandlord nested fields
            'referenceLandlord' => 'array',
            'landlord' => 'nullable|string',
            'landlord_centre_manager' => 'nullable|string',
            'center_phone_area_code' => 'nullable|string',
            'landlord_centre_manager_phone' => 'nullable|string',
            'landlord_centre_manager_email' => 'nullable|string',
            'center_mobile_area_code' => 'nullable|string',
            'landlord_centre_manager_mobile' => 'nullable|string',
            'landlord_leasing_manager' => 'nullable|string',
            'leasing_phone_area_code' => 'nullable|string',
            'landlord_leasing_manager_phone' => 'nullable|string',
            'landlord_leasing_manager_email' => 'nullable|string',
            'leasing_mobile_area_code' => 'nullable|string',
            'landlord_leasing_manager_mobile' => 'nullable|string',
            'landlord_design_manager' => 'nullable|string',
            'landlord_design_manager_email' => 'nullable|string',
            'design_phone_area_code' => 'nullable|string',
            'landlord_design_manager_phone' => 'nullable|string',
            'design_mobile_area_code' => 'nullable|string',
            'landlord_design_manager_mobile' => 'nullable|string',
            'landlord_tenancy_coordinator' => 'nullable|string',
            'tenancy_phone_area_code' => 'nullable|string',
            'landlord_tenancy_coordinator_phone' => 'nullable|string',
            'landlord_tenancy_coordinator_email' => 'nullable|string',
            'tenancy_mobile_area_code' => 'nullable|string',
            'landlord_tenancy_coordinator_mobile' => 'nullable|string',
            'landlord_facility_manager' => 'nullable|string',
            'facility_phone_area_code' => 'nullable|string',
            'landlord_facility_manager_phone' => 'nullable|string',
            'landlord_facility_manager_email' => 'nullable|string',
            'facility_mobile_area_code' => 'nullable|string',
            'landlord_facility_manager_mobile' => 'nullable|string',
            'landlord_security' => 'nullable|string',
            'security_phone_area_code' => 'nullable|string',
            'landlord_security_phone' => 'nullable|string',
            'landlord_security_email' => 'nullable|string',
            'security_mobile_area_code' => 'nullable|string',
            'landlord_security_mobile' => 'nullable|string',

            // ReferenceSpecialNote nested fields
            'referenceSpecialNote' => 'required|array',
            'referenceSpecialNote.special_notes' => 'nullable|string',
            'referenceSpecialNote.special_notes_start_date' => 'nullable|date',
            'referenceSpecialNote.special_notes_finish_date' => 'nullable|date',
            'referenceSpecialNote.special_notes_open_date' => 'nullable|date',
            'referenceSpecialNote.special_notes_trading_hours' => 'nullable|string',
            'referenceSpecialNote.designer' => 'nullable|string',
            'referenceSpecialNote.designer_contact' => 'nullable|string',
            'referenceSpecialNote.designer_phone_code' => 'nullable|string',
            'referenceSpecialNote.designer_phone' => 'nullable|string',
            'referenceSpecialNote.designer_email' => 'nullable|email',
            'referenceSpecialNote.designer_mobile_code' => 'nullable|string',
            'referenceSpecialNote.designer_mobile' => 'nullable|string',
            'referenceSpecialNote.designer_street' => 'nullable|string',
            'referenceSpecialNote.designer_suburb' => 'nullable|string',
            'referenceSpecialNote.designer_postcode' => 'nullable|string',
            'referenceSpecialNote.designer_state' => 'nullable|string',
            'referenceSpecialNote.designer_country' => 'nullable|string',

            // ReferenceEngineer nested fields
            'referenceEngineer' => 'array',
            'referenceEngineer.engineer' => 'nullable|string',
            'referenceEngineer.engineer_contact' => 'nullable|string',
            'referenceEngineer.engineer_phone_code' => 'nullable|string',
            'referenceEngineer.engineer_phone' => 'nullable|string',
            'referenceEngineer.engineer_email' => 'nullable|string',
            'referenceEngineer.engineer_mobile_code' => 'nullable|string',
            'referenceEngineer.engineer_mobile' => 'nullable|string',
            'referenceEngineer.engineer_street' => 'nullable|string',
            'referenceEngineer.designer_phone' => 'nullable|string',
            'referenceEngineer.designer_email' => 'nullable|string',
            'referenceEngineer.engineer_suburb' => 'nullable|string',
            'referenceEngineer.engineer_postcode' => 'nullable|string',
            'referenceEngineer.engineer_state' => 'nullable|string',
            'referenceEngineer.engineer_country' => 'nullable|string',

            'referenceEngineer.certifier' => 'nullable|string',
            'referenceEngineer.certifier_contact' => 'nullable|string',
            'referenceEngineer.certifier_phone_code' => 'nullable|string',
            'referenceEngineer.certifier_phone' => 'nullable|string',
            'referenceEngineer.certifier_email' => 'nullable|string',
            'referenceEngineer.certifer_mobile_code' => 'nullable|string',
            'referenceEngineer.certifier_mobile' => 'nullable|string',
            'referenceEngineer.certifier_street' => 'nullable|string',
            'referenceEngineer.certifier_suburb' => 'nullable|string',
            'referenceEngineer.certifier_postcode' => 'nullable|string',
            'referenceEngineer.certifier_state' => 'nullable|string',
            'referenceEngineer.certifier_country' => 'nullable|string',

            'referenceEngineer.council' => 'nullable|string',
            'referenceEngineer.council_contact' => 'nullable|string',
            'referenceEngineer.councial_phone_code' => 'nullable|string',
            'referenceEngineer.council_phone' => 'nullable|string',
            'referenceEngineer.council_email' => 'nullable|string',
            'referenceEngineer.council_mobile_code' => 'nullable|string',
            'referenceEngineer.council_mobile' => 'nullable|string',
            'referenceEngineer.council_street' => 'nullable|string',
            'referenceEngineer.council_suburb' => 'nullable|string',
            'referenceEngineer.council_postcode' => 'nullable|string',
            'referenceEngineer.council_state' => 'nullable|string',
            'referenceEngineer.council_country' => 'nullable|string',

            'referenceEngineer.bams_project_manager_contact' => 'nullable|string',
            'referenceEngineer.bams_project_manager_email' => 'nullable|string',
            'referenceEngineer.project_area_code' => 'nullable|string',
            'referenceEngineer.bams_project_manager_mobile' => 'nullable|string',
            'referenceEngineer.bams_site_manager_contact' => 'nullable|string',
            'referenceEngineer.bams_site_manager_email' => 'nullable|string',
            'referenceEngineer.site_area_code' => 'nullable|string',
            'referenceEngineer.bams_site_manager_mobile' => 'nullable|string',

        ];
    }
}
