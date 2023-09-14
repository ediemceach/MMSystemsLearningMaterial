<?php

class ExampeStatic

{
    
    public static int $aNum=0;
    public static function sayHello(): void
    {
        print "hello";
    }
    
}


print ExampeStatic::$aNum;
ExampeStatic::sayhello();

?>
