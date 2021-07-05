/**
* Validations js 
*
* Manages all the validations in the form
* 
*/
//https://salitha94.blogspot.com/2018/01/form-validation-using-jquery-validation.html
$(document).ready(function(){
// include the validation for the form function comes with this plugin
    $('#userfrm').validate({
        // set validation rules for input fields
        rules: {
            email_id: {
                required : true,
                email: true
            },
            password: {
                required : true,
                minlength: 5
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            email_id: {
                required : "Email is required",
                email: "Enter a valid email. Ex: example@gmail.com"
            },
            password: {
                required : "Password is required",
                minlength: "Password must contain at least 5 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    $('#claimhandfrm').validate({
        // set validation rules for input fields
        rules: {
            claim_insh_description: {
                required : true,
                maxlength: 200
            },
            calim_insh_alt_description: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_insh_description: {
                required : "Claim Insh Description is required",
                maxlength: "Claim Insh Description contain Maximum 200 characters"
            },
            calim_insh_alt_description: {
                required : "Claim Insh Alternate Description is required",
                maxlength: "Claim Insh Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    
    $('#claimhandfrmupdate').validate({
        // set validation rules for input fields
        rules: {
            claim_insh_description_edit: {
                required : true,
                maxlength: 200
            },
            calim_insh_alt_description_edit: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_insh_description_edit: {
                required : "Claim Insh Description is required",
                maxlength: "Claim Insh Description contain Maximum 200 characters"
            },
            calim_insh_alt_description_edit: {
                required : "Claim Insh Alternate Description is required",
                maxlength: "Claim Insh Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/

    $('#claimcoverfrm').validate({
        // set validation rules for input fields
        rules: {
            claim_cover_description: {
                required : true,
                maxlength: 200
            },
            claim_cover_alt_description: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_cover_description: {
                required : "Claim Insh Cover Description is required",
                maxlength: "Claim Insh Cover Description contain Maximum 200 characters"
            },
            claim_cover_alt_description: {
                required : "Claim Insh Cover Alternate Description is required",
                maxlength: "Claim Insh Cover Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    $('#claimcoverfrmupdate').validate({
        // set validation rules for input fields
        rules: {
            claim_cover_description_edit: {
                required : true,
                maxlength: 200
            },
            claim_cover_alt_description_edit: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_cover_description_edit: {
                required : "Claim Insh Cover Description is required",
                maxlength: "Claim Insh Cover Description contain Maximum 200 characters"
            },
            claim_cover_alt_description_edit: {
                required : "Claim Insh Cover Alternate Description is required",
                maxlength: "Claim Insh Cover Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    $('#claimscenefrm').validate({
        // set validation rules for input fields
        rules: {
            claim_scene_description: {
                required : true,
                maxlength: 200
            },
            claim_scene_alt_description: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_scene_description: {
                required : "Claim Scene Description is required",
                maxlength: "Claim Scene Description contain Maximum 200 characters"
            },
            claim_cover_alt_description: {
                required : "Claim Scene Alternate Description is required",
                maxlength: "Claim Scene Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    $('#claimscenefrmupdate').validate({
        // set validation rules for input fields
        rules: {
            claim_scene_description_edit: {
                required : true,
                maxlength: 200
            },
            claim_scene_alt_description_edit: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_scene_description_edit: {
                required : "Claim Scene Description is required",
                maxlength: "Claim Scene Description contain Maximum 200 characters"
            },
            claim_cover_alt_description_edit: {
                required : "Claim Scene Alternate Description is required",
                maxlength: "Claim Scene Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    
    /**
    * Validates claim status add form
    */
    $('#claimstatusfrm').validate({
        // set validation rules for input fields
        rules: {
            claim_status_description: {
                required : true,
                maxlength: 200
            },
            calim_status_alt_description: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_status_description: {
                required : "Claim Status Description is required",
                maxlength: "Claim Status Description contain Maximum 200 characters"
            },
            calim_status_alt_description: {
                required : "Claim Status Alternate Description is required",
                maxlength: "Claim Status Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/

    /**
    * Validates claim status update form
    */
    $('#claimstatusfrmupdate').validate({
        // set validation rules for input fields
        rules: {
            claim_status_description_edit: {
                required : true,
                maxlength: 200
            },
            claim_status_alt_description_edit: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_status_description_edit: {
                required : "Claim Status Description is required",
                maxlength: "Claim Status Description contain Maximum 200 characters"
            },
            claim_status_alt_description_edit: {
                required : "Claim Status Alternate Description is required",
                maxlength: "Claim Status Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
     /**
    * Validates claimm handler add form
    */
    $('#claimmhandlerfrm').validate({
        // set validation rules for input fields
        rules: {
            claimm_hand_description: {
                required : true,
                maxlength: 200
            },
            claimm_hand_alt_description: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claimm_hand_description: {
                required : "Claimm Handler Description is required",
                maxlength: "Claimm Handler Description contain Maximum 200 characters"
            },
            claimm_hand_alt_description: {
                required : "Claimm Handler Alternate Description is required",
                maxlength: "Claimm Handler Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/

    /**
    * Validates claimm handler update form
    */
    $('#claimmhandlerfrmupdate').validate({
        // set validation rules for input fields
        rules: {
            claimm_hand_description_edit: {
                required : true,
                maxlength: 200
            },
            claimm_hand_alt_description_edit: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claimm_hand_description_edit: {
                required : "Claimm Handler Description is required",
                maxlength: "Claimm Handler Description contain Maximum 200 characters"
            },
            claimm_hand_alt_description_edit: {
                required : "Claimm Handler Alternate Description is required",
                maxlength: "Claimm Handler Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    /**
    * Validates claim city add form
    */
    $('#claimcityfrm').validate({
        // set validation rules for input fields
        rules: {
            claim_city_description: {
                required : true,
                maxlength: 200
            },
            claim_city_alt_description: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_city_description: {
                required : "Claim City Description is required",
                maxlength: "Claim City Description contain Maximum 200 characters"
            },
            claim_city_alt_description: {
                required : "Claim City Alternate Description is required",
                maxlength: "Claim City Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/

    /**
    * Validates claimm city update form
    */
    $('#claimcityfrmupdate').validate({
        // set validation rules for input fields
        rules: {
            claim_city_description_edit: {
                required : true,
                maxlength: 200
            },
            claim_city_alt_description_edit: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_city_description_edit: {
                required : "Claim City Description is required",
                maxlength: "Claim City Description contain Maximum 200 characters"
            },
            claim_city_alt_description_edit: {
                required : "Claim City Alternate Description is required",
                maxlength: "Claim City Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /**
    * Validates claim severity add form
    */
    $('#claimseverityfrm').validate({
        // set validation rules for input fields
        rules: {
            claim_severity_description: {
                required : true,
                maxlength: 200
            },
            claim_severity_alt_description: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_severity_description: {
                required : "Claim Severity Description is required",
                maxlength: "Claim Severity Description contain Maximum 200 characters"
            },
            claim_severity_alt_description: {
                required : "Claim Severity Alternate Description is required",
                maxlength: "Claim Severity Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/

    /**
    * Validates claimm severity update form
    */
    $('#claimseverityfrmupdate').validate({
        // set validation rules for input fields
        rules: {
            claim_severity_description_edit: {
                required : true,
                maxlength: 200
            },
            claim_severity_alt_description_edit: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_severity_description_edit: {
                required : "Claim Severity Description is required",
                maxlength: "Claim Severity Description contain Maximum 200 characters"
            },
            claim_severity_alt_description_edit: {
                required : "Claim Severity Alternate Description is required",
                maxlength: "Claim Severity Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /**
    * Validates claim ins company add form
    */
    $('#claimcompanyfrm').validate({
        // set validation rules for input fields
        rules: {
            company_description: {
                required : true,
                maxlength: 200
            },
            company_alt_description: {
                required : true,
                maxlength: 200
            },
            address: {
                required : true,
                maxlength: 200
            },
            phone: {
                required : true,
                matches: "[0-9]+",  
                minlength:8,
                maxlength:8
            },
            fax: {
                required : true,
                matches: "[0-9]+",  
                minlength:8,
                maxlength:8
            },
            email: {
                required : true,
                email: true 
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            company_description: {
                required : "Claim Ins Company Description is required",
                maxlength: "Claim Ins Company Description contain Maximum 200 characters"
            },
            company_alt_description: {
                required : "Claim Ins Company Alternate Description is required",
                maxlength: "Claim Ins Company Alternate Description contain Maximum 200 characters"
            },
            address: {
                required : "Address is required",
                maxlength: "Address contain Maximum 200 characters"
            },
            phone: {
                required : "Phone No. is required",
                maxlength: "Phone No. contain Maximum 8 No.",
                matches: "Enter Valid Phone Number"
            },
            fax: {
                required : "Fax No. is required",
                maxlength: "Fax No. contain Maximum 8 No.",
                matches: "Enter Valid Fax Number"
            },
            email: {
                required : "Email Address is required",
                email: "Enter Valid Email Address Ex: example@gmail.com"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/

    /**
    * Validates claim ins company update form
    */
    $('#claimcompanyfrmupdate').validate({
        // set validation rules for input fields
        rules: {
            company_description_edit: {
                required : true,
                maxlength: 200
            },
            company_alt_description_edit: {
                required : true,
                maxlength: 200
            },
            address_edit: {
                required : true,
                maxlength: 200
            },
            phone_edit: {
                required : true,
                matches: "[0-9]+",  
                minlength:8,
                maxlength:8
            },
            fax_edit: {
                required : true,
                matches: "[0-9]+",  
                minlength:8,
                maxlength:8
            },
            email_edit: {
                required : true,
                email: true 
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            company_description_edit: {
                required : "Claim Ins Company Description is required",
                maxlength: "Claim Ins Company Description contain Maximum 200 characters"
            },
            company_alt_description_edit: {
                required : "Claim Ins Company Alternate Description is required",
                maxlength: "Claim Ins Company Alternate Description contain Maximum 200 characters"
            },
            address_edit: {
                required : "Address is required",
                maxlength: "Address contain Maximum 200 characters"
            },
            phone_edit: {
                required : "Phone No. is required",
                maxlength: "Phone No. contain Maximum 8 No.",
                matches: "Enter Valid Phone Number"
            },
            fax_edit: {
                required : "Fax No. is required",
                maxlength: "Fax No. contain Maximum 8 No.",
                matches: "Enter Valid Fax Number"
            },
            email_edit: {
                required : "Email Address is required",
                email: "Enter a valid email. Ex: example@gmail.com"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /**
    * Validates claim assessor add form
    */
    $('#claimassessorfrm').validate({
        // set validation rules for input fields
        rules: {
            claim_assessor_description: {
                required : true,
                maxlength: 200
            },
            claim_assessor_alt_description: {
                required : true,
                maxlength: 200
            },
            phone: {
                required : true,
                matches: "[0-9]+",  
                minlength:8,
                maxlength:8
            },
             email: {
                required : true,
                email: true 
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_assessor_description: {
                required : "Claim Assessor Description is required",
                maxlength: "Claim Assessor Description contain Maximum 200 characters"
            },
            claim_assessor_alt_description: {
                required : "Claim Assessor Alternate Description is required",
                maxlength: "Claim Assessor Alternate Description contain Maximum 200 characters"
            },
            phone: {
                required : "Phone No. is required",
                maxlength: "Phone No. contain Maximum 8 No.",
                matches: "Enter Valid Phone Number"
            },
            email: {
                required : "Email Address is required",
                email: "Enter Valid Email Address Ex: example@gmail.com"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/

    /**
    * Validates claimm assessor update form
    */
    $('#claimassessorfrmupdate').validate({
        // set validation rules for input fields
        rules: {
            claim_assessor_description_edit: {
                required : true,
                maxlength: 200
            },
            claim_assessor_alt_description_edit: {
                required : true,
                maxlength: 200
            },
            phone_edit: {
                required : true,
                matches: "[0-9]+",  
                minlength:8,
                maxlength:8
            },
            email_edit: {
                required : true,
                email: true 
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_assessor_description_edit: {
                required : "Claim Assessor Description is required",
                maxlength: "Claim Assessor Description contain Maximum 200 characters"
            },
            claim_assessor_alt_description_edit: {
                required : "Claim Assessor Alternate Description is required",
                maxlength: "Claim Assessor Alternate Description contain Maximum 200 characters"
            },
            phone_edit: {
                required : "Phone No. is required",
                maxlength: "Phone No. contain Maximum 8 No.",
                matches: "Enter Valid Phone Number"
            },
            email_edit: {
                required : "Email Address is required",
                email: "Enter a valid email. Ex: example@gmail.com"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    /**
    * Validates claim garage add form
    */
    $('#claimgaragefrm').validate({
        // set validation rules for input fields
        rules: {
            description: {
                //required : true,
                //maxlength: 200
            },
            description_alt: {
                //required : true,
                //maxlength: 200
            },
            contact: {
                //required : true,
                //minlength: 8,
                //maxlength: 8,
                //matches: "[0-9]+"
            },
            fax: {
                //required : true,
                //minlength:8,
                //maxlength: 8,
                //matches: "[0-9]+"  
            },
            email: {
                //required : true,
                //maxlength: 100,
                //email : true
            },

        },
        // set validation messages for the rules are set previously
        messages: {
            description: {
                //required : "Claim Garage Description is required",
                //maxlength: "Claim Garage Description exceeds maxlength"
            },
            description_alt: {
                //required : "Claim Garage Alternate Description is required",
                //maxlength: "Claim Garage Alternate Description exceeds maxlength"
            },
            contact: {
                //required : "Claim Garage Contact is required",
                //minlength: "Claim Garage Contact must contain at least 8 characters",
                //maxlength: "Claim Garage Contact exceeds maxlength",
                //matches: "Enter Valid Contact"
            },
            fax: {
                //required : "Claim Garage Alternate Description is required",
                //minlength: "Claim Garage Contact must contain at least 8 characters",
                //maxlength: "Claim Garage Alternate Description exceeds maxlength",
                //matches: "Enter Valid Fax"
            },
            email: {
                //required : "Claim Garage Email is required",
                //maxlength: "Claim Garage Email exceeds maxlength",
                //email: "Enter a valid email. Ex: example@gmail.com"
            },
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    /**
    * Validates claim garage update form
    */
    $('#claimgaragefrmupdate').validate({
        // set validation rules for input fields
        rules: {
            description_edit: {
                //required : true,
                //maxlength: 200
            },
            description_alt_edit: {
                //required : true,
                //maxlength: 200
            },
            contact_edit: {
                //required : true,
                //minlength: 8,
                //maxlength: 8,
                //matches: "[0-9]+"
            },
            fax_edit: {
                //required : true,
                //minlength:8,
                //maxlength: 8,
                //matches: "[0-9]+"  
            },
            email_edit: {
                //required : true,
                //maxlength: 100,
                //email : true
            },

        },
        // set validation messages for the rules are set previously
        messages: {
            description_edit: {
                //required : "Claim Garage Description is required",
                //maxlength: "Claim Garage Description exceeds maxlength"
            },
            description_alt_edit: {
                //required : "Claim Garage Alternate Description is required",
                //maxlength: "Claim Garage Alternate Description exceeds maxlength"
            },
            contact_edit: {
                //required : "Claim Garage Contact is required",
                //minlength: "Claim Garage Contact must contain at least 8 characters",
                //maxlength: "Claim Garage Contact exceeds maxlength",
                //matches: "Enter Valid Contact"
            },
            fax_edit: {
                //required : "Claim Garage Alternate Description is required",
                //minlength: "Claim Garage Contact must contain at least 8 characters",
                //maxlength: "Claim Garage Alternate Description exceeds maxlength",
                //matches: "Enter Valid Fax"
            },
            email_edit: {
                //required : "Claim Garage Email is required",
                //maxlength: "Claim Garage Email exceeds maxlength",
                //email: "Enter a valid email. Ex: example@gmail.com"
            },
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/

    /**
    * Validates claim lawyer add form
    */
    $('#claimlawyerfrm').validate({
        // set validation rules for input fields
        rules: {
            description: {
                required : true,
                maxlength: 200
            },
            description_alt: {
                required : true,
                maxlength: 200
            },
            contact: {
                required : true,
                minlength: 8,
                maxlength: 8,
                matches: "[0-9]+"
            },
            fax: {
                required : true,
                minlength:8,
                maxlength: 8,
                matches: "[0-9]+"  
            },
            email: {
                required : true,
                maxlength: 100,
                email : true
            },

        },
        // set validation messages for the rules are set previously
        messages: {
            description: {
                required : "Claim Lawyer Description is required",
                maxlength: "Claim Lawyer Description exceeds maxlength"
            },
            description_alt: {
                required : "Claim Lawyer Alternate Description is required",
                maxlength: "Claim Lawyer Alternate Description exceeds maxlength"
            },
            contact: {
                required : "Claim Lawyer Contact is required",
                minlength: "Claim Lawyer Contact must contain at least 8 characters",
                maxlength: "Claim Lawyer Contact exceeds maxlength",
                matches: "Enter Valid Contact"
            },
            fax: {
                required : "Claim Lawyer Alternate Description is required",
                minlength: "Claim Lawyer Contact must contain at least 8 characters",
                maxlength: "Claim Lawyer Alternate Description exceeds maxlength",
                matches: "Enter Valid Fax"
            },
            email: {
                required : "Claim Lawyer Email is required",
                maxlength: "Claim Lawyer Email exceeds maxlength",
                email: "Enter a valid email. Ex: example@gmail.com"
            },
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    /**
    * Validates claim lawyer update form
    */
    $('#claimlawyerfrmupdate').validate({
        // set validation rules for input fields
        rules: {
            description_edit: {
                required : true,
                maxlength: 200
            },
            description_alt_edit: {
                required : true,
                maxlength: 200
            },
            contact_edit: {
                required : true,
                minlength: 8,
                maxlength: 8,
                matches: "[0-9]+"
            },
            fax_edit: {
                required : true,
                minlength:8,
                maxlength: 8,
                matches: "[0-9]+"  
            },
            email_edit: {
                required : true,
                maxlength: 100,
                email : true
            },

        },
        // set validation messages for the rules are set previously
        messages: {
            description_edit: {
                required : "Claim Lawyer Description is required",
                maxlength: "Claim Lawyer Description exceeds maxlength"
            },
            description_alt_edit: {
                required : "Claim Lawyer Alternate Description is required",
                maxlength: "Claim Lawyer Alternate Description exceeds maxlength"
            },
            contact_edit: {
                required : "Claim Lawyer Contact is required",
                minlength: "Claim Lawyer Contact must contain at least 8 characters",
                maxlength: "Claim Lawyer Contact exceeds maxlength",
                matches: "Enter Valid Contact"
            },
            fax_edit: {
                required : "Claim Lawyer Alternate Description is required",
                minlength: "Claim Lawyer Contact must contain at least 8 characters",
                maxlength: "Claim Lawyer Alternate Description exceeds maxlength",
                matches: "Enter Valid Fax"
            },
            email_edit: {
                required : "Claim Lawyer Email is required",
                maxlength: "Claim Lawyer Email exceeds maxlength",
                email: "Enter a valid email. Ex: example@gmail.com"
            },
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/

    /**
    * Validates claim insured object add form
    */
    $('#claiminsuredObjectfrm').validate({
        // set validation rules for input fields
        rules: {
            description: {
                required : true,
                maxlength: 200
            },
            description_alt: {
                required : true,
                maxlength: 200
            },

        },
        // set validation messages for the rules are set previously
        messages: {
            description: {
                required : "Claim Insured Object Description is required",
                maxlength: "Claim Insured Object Description exceeds maxlength"
            },
            description_alt: {
                required : "Claim Insured Object Alternate Description is required",
                maxlength: "Claim Insured Object Alternate Description exceeds maxlength"
            }
            
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    /**
    * Validates claim insured object update form
    */
    $('#claimlawyerfrmupdate').validate({
        // set validation rules for input fields
        rules: {
            description_edit: {
                required : true,
                maxlength: 200
            },
            description_alt_edit: {
                required : true,
                maxlength: 200
            }

        },
        // set validation messages for the rules are set previously
        messages: {
            description_edit: {
                required : "Claim Insured Object Description is required",
                maxlength: "Claim Insured Object Description exceeds maxlength"
            },
            description_alt_edit: {
                required : "Claim Insured Object Alternate Description is required",
                maxlength: "Claim Insured Object Alternate Description exceeds maxlength"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/
    /*************************************************************************************/

    /**
    * Validates claim non motor add form
    */
    $('#claimnonmotorfrm').validate({
        // set validation rules for input fields
        rules: {
            non_motor_description: {
                required : true,
                maxlength: 200
            },
            non_motor_alt_description: {
                required : true,
                maxlength: 200
            },

        },
        // set validation messages for the rules are set previously
        messages: {
            non_motor_description: {
                required : "Claim Non Motor Description is required",
                maxlength: "Claim Non Motor Description exceeds maxlength"
            },
            non_motor_alt_description: {
                required : "Claim Non Motor Alternate Description is required",
                maxlength: "Claim Non Motor Alternate Description exceeds maxlength"
            }
            
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    /**
    * Validates claim non motor update form
    */
    $('#claimnonmotorfrmupdate').validate({
        // set validation rules for input fields
        rules: {
            non_motor_description_edit: {
                required : true,
                maxlength: 200
            },
            non_motor_alt_description_edit: {
                required : true,
                maxlength: 200
            }

        },
        // set validation messages for the rules are set previously
        messages: {
            non_motor_description_edit: {
                required : "Claim Non Motor Description is required",
                maxlength: "Claim Non Motor Description exceeds maxlength"
            },
            non_motor_alt_description_edit: {
                required : "Claim Non Motor Alternate Description is required",
                maxlength: "Claim Non Motor Alternate Description exceeds maxlength"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/

    /**
    * Validates involved part add form
    */
    $('#involvedpartfrm').validate({
        // set validation rules for input fields
        rules: {
            description: {
                required : true,
                maxlength: 200
            },
            alt_description: {
                required : true,
                maxlength: 200
            },

        },
        // set validation messages for the rules are set previously
        messages: {
            description: {
                required : "Involved Part Description is required",
                maxlength: "Involved Part Description exceeds maxlength"
            },
            alt_description: {
                required : "Involved Part Alternate Description is required",
                maxlength: "Involved Part Alternate Description exceeds maxlength"
            }
            
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    /**
    * Validates involved part update form
    */
    $('#involvedpartfrmupdate').validate({
        // set validation rules for input fields
        rules: {
            description_edit: {
                required : true,
                maxlength: 200
            },
            alt_description_edit: {
                required : true,
                maxlength: 200
            }

        },
        // set validation messages for the rules are set previously
        messages: {
            description_edit: {
                required : "Involved Part Description is required",
                maxlength: "Involved Part Description exceeds maxlength"
            },
            alt_description_edit: {
                required : "Involved Part Alternate Description is required",
                maxlength: "Involved Part Alternate Description exceeds maxlength"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/

    /**
    * Validates cl amount add form
    */
    $('#clamountfrm').validate({
        // set validation rules for input fields
        rules: {
            cl_amount_description: {
                required : true,
                maxlength: 200
            },
            cl_amount_alt_description: {
                required : true,
                maxlength: 200
            },
            cl_amount_fieldname: {
                required : true,
                maxlength: 200
            }

        },
        // set validation messages for the rules are set previously
        messages: {
            cl_amount_description: {
                required : "Cl Amount Description is required",
                maxlength: "Cl Amount Description exceeds maxlength"
            },
            cl_amount_alt_description: {
                required : "Cl Amount Alternate Description is required",
                maxlength: "Cl Amount Alternate Description exceeds maxlength"
            },
            cl_amount_fieldname: {
                required : "Cl Amount Field Name is required",
                maxlength: "Cl Amount Field Name exceeds maxlength"
            }
            
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    /**
    * Validates cl amount update form
    */
    $('#clamountfrmupdate').validate({
        // set validation rules for input fields
        rules: {
            cl_amount_description_edit: {
                required : true,
                maxlength: 200
            },
            cl_amount_alt_description_edit: {
                required : true,
                maxlength: 200
            },
            cl_amount_fieldname_edit: {
                required : true,
                maxlength: 200
            }

        },
        // set validation messages for the rules are set previously
        messages: {
            cl_amount_description_edit: {
                required : "Cl Amount Description is required",
                maxlength: "Cl Amount Description exceeds maxlength"
            },
            cl_amount_alt_description_edit: {
                required : "Cl Amount Alternate Description is required",
                maxlength: "Cl Amount Alternate Description exceeds maxlength"
            },
            cl_amount_fieldname_edit: {
                required : "Cl Amount Field Name is required",
                maxlength: "Cl Amount Field Name exceeds maxlength"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    /**
    * Validates claim type add form
    */
    $('#claimtypefrm').validate({
        // set validation rules for input fields
        rules: {
            claim_type_description: {
                required : true,
                maxlength: 200
            },
            claim_type_alt_description: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_type_description: {
                required : "Claim Injuries Description is required",
                maxlength: "Claim Injuries Description contain Maximum 200 characters"
            },
            claim_type_alt_description: {
                required : "Claim Injuries Alternate Description is required",
                maxlength: "Claim Injuries Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/

    /**
    * Validates claim type update form
    */
    $('#claimtypefrmupdate').validate({
        // set validation rules for input fields
        rules: {
            claim_type_description_edit: {
                required : true,
                maxlength: 200
            },
            claim_type_alt_description_edit: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_type_description_edit: {
                required : "Claim Injuries Description is required",
                maxlength: "Claim Injuries Description contain Maximum 200 characters"
            },
            claim_type_alt_description_edit: {
                required : "Claim Injuries Alternate Description is required",
                maxlength: "Claim Injuries Alternate Description contain Maximum 200 characters"
            }
        }
    });
     /*************************************************************************************/
    /*************************************************************************************/
    /**
    * Validates claim ins driver add form
    */
    $('#claimdriverfrm').validate({
        // set validation rules for input fields
        rules: {
            claim_driver_description: {
                required : true,
                maxlength: 200
            },
            claim_driver_alt_description: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_driver_description: {
                required : "Claim Ins Driver Description is required",
                maxlength: "Claim Ins Driver Description contain Maximum 200 characters"
            },
            claim_driver_alt_description: {
                required : "Claim Ins Driver Alternate Description is required",
                maxlength: "Claim Ins Driver Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/

    /**
    * Validates claim ins driver update form
    */
    $('#claimdriverfrmupdate').validate({
        // set validation rules for input fields
        rules: {
            claim_driver_description_edit: {
                required : true,
                maxlength: 200
            },
            claim_driver_alt_description_edit: {
                required : true,
                maxlength: 200
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_driver_description_edit: {
                required : "Claim Ins Driver Description is required",
                maxlength: "Claim Ins Driver Description contain Maximum 200 characters"
            },
            claim_driver_alt_description_edit: {
                required : "Claim Ins Driver Alternate Description is required",
                maxlength: "Claim Ins Driver Alternate Description contain Maximum 200 characters"
            }
        }
    });
    /*************************************************************************************/
    /*************************************************************************************/
    /**
    * Validates add claim Record form
    */
   /*$('#addRecordfrm').validate({
        // set validation rules for input fields
        rules: {
            claim_sequence: {
                required : true,
                maxlength: 80
            },
            insurance_company: {
                required : true
                
            },
            claim_number: {
                required : true
                
            },
            loss_date_time: {
                required : true
                
            },
            entry_date: {
                required : true
                
            },
            insurance_company_handler: {
                required : true
                
            },
            claim_status: {
                required : true
                
            },
            claim_severity: {
                required : true
                
            },
            claim_local_handler: {
                required : true
                
            },
            assign_date: {
                required : true
                
            },
            visit_claim_scene: {
                required : true
                
            },
            claim_address: {
                required : true
                
            },
            city: {
                required : true
                
            },
            
            policy_number: {
                required : true
                
            },
            policy_cover: {
                required : true
                
            },
            policy_insured_amount: {
                required : true
                
            },
            policy_excess: {
                required : true
                
            },
            datepicker: {
                required : true
                
            },
            insured_id: {
                required : true
                
            },
            insured_name: {
                required : true
                
            },
            insured_contact_info: {
                required : true
                
            },
            assesment: {
                required : true
                
            },
            handling_charges: {
                required : true
                
            },
            investigation_charges: {
                required : true
                
            },
            discount: {
                required : true
                
            },
            total: {
                required : true
                
            },
            reference: {
                required : true
                
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_sequence: {
                required : "Claim Sequence is required",
                maxlength: "Claim Sequence contain Maximum 80 characters"
            },
            insurance_company: {
                required : "Insured Company is required"
            },
            claim_number: {
                required : "Claim Number is required"
            },
            loss_date_time: {
                required : "Lass Date Time is required"
            },
            entry_date: {
                required : "Entry Date is required"
            },
            insurance_company_handler: {
                required : "Insurance Company Handler is required"
            },
            claim_status: {
                required : "Claim Status is required"
            },
            claim_severity: {
                required : "Claim Severity is required"
            },
            claim_local_handler: {
                required : "Claim Local Handler is required"
            },
            assign_date: {
                required : "Assign Date is required"
            },
            visit_claim_scene: {
                required : "Visit Claim Scene is required"
            },
            claim_address: {
                required : "Claim Address is required"
            },
            city: {
                required : "City is required"
            },
            
            policy_number: {
                required : "Policy Number is required"
            },
            policy_cover: {
                required : "Policy Cover is required"
            },
            policy_insured_amount: {
                required : "Policy Insured Amount is required"
            },
            policy_excess: {
                required : "Policy Excess is required"
            },
            effective_date: {
                required : "Effective Date is required"
            },
            expiry_date: {
                required : "Expiry Date is required"
            },
            insured_id: {
                required : "Insured Id is required"
            },
            insured_name: {
                required : "Insured Name is required"
            },
            insured_contact_info: {
                required : "Insured Contact Info is required"
            },
            assesment: {
                required : "Assesment is required"
            },
            handling_charges: {
                required : "Handling Charges is required"
            },
            investigation_charges: {
                required : "Investigation Charges is required"
            },
            discount: {
                required : "Discount is required"
            },
            total: {
                required : "Total is required"
            },
            reference: {
                required : "Reference is required"
            }
            
        }
    });*/
/*************************************************************************************/
/*************************************************************************************/
/**
    * Validates update claim Record form
    */
   /*$('#updateRecordfrm').validate({
        // set validation rules for input fields
        rules: {
            claim_sequence: {
                required : true,
                maxlength: 80
            },
            insurance_company: {
                required : true
                
            },
            claim_number: {
                required : true
                
            },
            loss_date_time: {
                required : true
                
            },
            entry_date: {
                required : true
                
            },
            insurance_company_handler: {
                required : true
                
            },
            claim_status: {
                required : true
                
            },
            claim_severity: {
                required : true
                
            },
            claim_local_handler: {
                required : true
                
            },
            assign_date: {
                required : true
                
            },
            visit_claim_scene: {
                required : true
                
            },
            claim_address: {
                required : true
                
            },
            city: {
                required : true
                
            },
            police_description: {
                required : true
                
            },
            policy_number: {
                required : true
                
            },
            policy_cover: {
                required : true
                
            },
            policy_insured_amount: {
                required : true
                
            },
            policy_excess: {
                required : true
                
            },
            datepicker: {
                required : true
                
            },
            insured_id: {
                required : true
                
            },
            insured_name: {
                required : true
                
            },
            insured_contact_info: {
                required : true
                
            },
            assesment: {
                required : true
                
            },
            handling_charges: {
                required : true
                
            },
            investigation_charges: {
                required : true
                
            },
            discount: {
                required : true
                
            },
            total: {
                required : true
                
            },
            reference: {
                required : true
                
            }
        },
        // set validation messages for the rules are set previously
        messages: {
            claim_sequence: {
                required : "Claim Sequence is required",
                maxlength: "Claim Sequence contain Maximum 80 characters"
            },
            insurance_company: {
                required : "Insured Company is required"
            },
            claim_number: {
                required : "Claim Number is required"
            },
            loss_date_time: {
                required : "Loss Date Time is required"
            },
            entry_date: {
                required : "Entry Date is required"
            },
            insurance_company_handler: {
                required : "Insurance Company Handler is required"
            },
            claim_status: {
                required : "Claim Status is required"
            },
            claim_severity: {
                required : "Claim Severity is required"
            },
            claim_local_handler: {
                required : "Claim Local Handler is required"
            },
            assign_date: {
                required : "Assign Date is required"
            },
            visit_claim_scene: {
                required : "Visit Claim Scene is required"
            },
            claim_address: {
                required : "Claim Address is required"
            },
            city: {
                required : "City is required"
            },
           
            police_description: {
                required : "Police Description is required"
            },
            policy_number: {
                required : "Policy Number is required"
            },
            policy_cover: {
                required : "Policy Cover is required"
            },
            policy_insured_amount: {
                required : "Policy Insured Amount is required"
            },
            policy_excess: {
                required : "Policy Excess is required"
            },
            effective_date: {
                required : "Effective Date is required"
            },
            expiry_date: {
                required : "Expiry Date is required"
            },
            insured_id: {
                required : "Insured Id is required"
            },
            insured_name: {
                required : "Insured Name is required"
            },
            insured_contact_info: {
                required : "Insured Contact Info is required"
            },
            assesment: {
                required : "Assesment is required"
            },
            handling_charges: {
                required : "Handling Charges is required"
            },
            investigation_charges: {
                required : "Investigation Charges is required"
            },
            discount: {
                required : "Discount is required"
            },
            total: {
                required : "Total is required"
            },
            reference: {
                required : "Reference is required"
            }
            
        }
    });*/
/*************************************************************************************/
/*************************************************************************************/
    
});
