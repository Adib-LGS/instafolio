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
       return "https://instafolio-avatar.s3.ca-central-1.amazonaws.com/default.png?response-content-disposition=inline&X-Amz-Security-Token=IQoJb3JpZ2luX2VjEP%2F%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FwEaCWV1LXdlc3QtMyJHMEUCIQC1AWS%2FOjAqiRjUq1YKs7XKq7532fOEuu8EMaOQqLMqigIgRDJnAF65GcDu7LIxc3jNSf%2B4niSpg6GaXfXX2LVRezQqgQIIqP%2F%2F%2F%2F%2F%2F%2F%2F%2F%2FARAAGgwwMjg0ODY3NDExNjYiDBpmtQ0O4qqHzXjqsyrVASF%2F%2Fk42cHwXI7W8by9uOk1ZBOnclm5RGPGYM32RNGmX%2FrEIy8bvHNMG9yMJPL8zKNzB7VFP0BxROXnGGXfzLjCr5Z6c6%2Fp3zmkNDg6xSjQ%2F7D4SutbdTPbytpQSoPLJG1lINEgiQsirDJvV3hziPDLN7wwwOXfZ0JFL%2BQiB%2FfSeVjsZDJFzBY3D5YZKe5qpxvCmStNXhmqWva46XnKSIoXfrSHsTFnpfcmyto7XUniEH%2BsqIB4oH94bIehtrmzxdciOT0uubFY82u0aT%2BMbwbVpxaluTDDRtbz4BTr2AvQpPV1O1DCTCKjw4aKIwRdH3sk%2BKgSkSxj41AirQ4xQbF7KSGetcW7Vh5wuIQTifO7WJw9C4NgnMh%2BgDBSS3TyWxWOdYkjzFeB%2Bg01Vo2VcPPlgiKQs%2BsPPS4jiNYIWFSHgNQSoVISRhl6YTC%2BaOlUTdbbtmEw%2F2OligSf4y0dVqwhZd2ChcvyI5p4GtCAQdsN1r18ohjoFA6wxkUcwZ4JupuORJGQUeqTv0tD9LpzX9MgdJJc0K%2FH3hhDrUMHlrWQEJ21YCLxdNTp2A%2FqI9vG8724%2FEP2I45vJVJohGVYFGP1LeeGckSV%2FPC31VuaonGlhTRtfr0EucmwvlfsUGWCJvY1Yk0BwYdT8A0bgfxXL4c50x6MdAcJFUPl79m1Ly0MSBgAm3yVn%2FZ4J4eiP1oNG5%2BjXdDUOSAU63KSIvRhB6lqGq%2BH35k8%2B9xrL5%2Fh219UIM1Opo5JuCcoeEOqBMO1rNhP0wUM79UAXZD4FLuf41DJqd4s9&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Date=20200715T150730Z&X-Amz-SignedHeaders=host&X-Amz-Expires=300&X-Amz-Credential=ASIAQNIPRFSXJ5PC46PV%2F20200715%2Fca-central-1%2Fs3%2Faws4_request&X-Amz-Signature=104bbf6d7b7a28b329247eb132f10b1e93007fc1526f632f37b32e0f263086c7";
    }

    /**Followers Relationship */
    public function followers()
    {
        return $this->belongsToMany('App\User');
    }
}
