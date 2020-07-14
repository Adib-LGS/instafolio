<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    
    //Skip MassAssignement Error
    protected $guarded = [];
    

    /**Each Profile BelongsTo each User */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
    * Defaut Image creation Profile User
    */
    public function getImage()
    {
       return "https://instafolio-avatar.s3.ca-central-1.amazonaws.com/default.png?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEOP%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaCWV1LXdlc3QtMyJHMEUCIQDyeIax8QsYsCFDoAS7SrdEI0zLHO6oZAjqGiFHQ%2FWpVwIgB%2Bwmeh26kO9ZmlrrvXbGJN5ERPWABMImulfUbua%2FEm8qgQIIjP%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FARAAGgwwMjg0ODY3NDExNjYiDCb81fJm3zqOV66%2BQirVAe1dxaEIbeuDPCii9vSks9HcS1ppF9a3v%2FL8QTZ1bje%2BcQkBpBvxRHGXvl9YbbohiAUxEg4uJPlrTa3Sd8eI6fJYiAKgU%2BndPzS%2B3wgqeFIR624NQoCt5kM%2FrmzojqpdyC6w4smIEK5rMblJKU8CtDsrtBtFSJDWp%2FmcZUWWU4jhsP2Qh7s%2FdQXpOzRyD45Fb58ye6kasGiYBRjT3HSguQXXc9t7xOK4izbdQXudiwdD7GAYHUYi6rvtlGKarDCNzSqqEzPmiuKw2ExABU6TEOsGKtXmhDDeprb4BTr2AoU6LFEeXwDf3KraBwcesau1RApHhinlbHlFkaqBvoghibY0Kw1cNhuvt4YiNq3FAjtOFE%2BElbV1YOX%2BXd5koQwbrSEcmo617OOBvUsgwssLwD6PpPC7Ku%2Ftuos4w2%2FptJRzvqcXhVDaCbd6btGmJ%2BDeenLl7rhUcVdbH6ppPcfQD%2FvFVQwczBkjUNCEpFq1ShZrDwWVb88PL%2FsIAwuT%2Fo0jK32BH3R9piWyRjJBOqbe8w4i3jQsDIK7nuXPFz7fuAfvcOuHQM0BCWH%2FKkImjE1vAL6WbzrrD19g9lKhmFwhYJuVa09GaW%2Fae47%2FqcjMxbb%2BHfcudt7sDB%2FOeVOMlIm7rkDykjvXdbSLbCGaStBULGppzQktMJ%2BcK0YOGwosRmeW1NQK7ppKBKZJ18iJndCfqrkZoIf3gpRLM2%2FSqmXqmhNGRKlsbX0aDuQYtdXIH9t5ROcTm16Xa8FVbF2z%2BzhKt22sTq9o2bgP3WCfILW85hySMhwr&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20200714T164241Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAQNIPRFSXALC6PG7U%2F20200714%2Fca-central-1%2Fs3%2Faws4_request&X-Amz-Signature=e1fa7b632f8b90ba284f633c5e251839896e74f58f226d892f8775d0dff35c62";
    }

    /**Followers Relationship */
    public function followers()
    {
        return $this->belongsToMany('App\User');
    }
}
