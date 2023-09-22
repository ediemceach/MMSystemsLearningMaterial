<?php

class ExampeStatic

{
    
    public static int $aNum=0;
    public static function sayHello(): void
    {
        self::$aNum++;
        print "hello";
    }
    
}


print ExampeStatic::$aNum;
ExampeStatic::sayHello();
print ExampeStatic::$aNum;

?>
