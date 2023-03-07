<?php
class Test {
    public function test()
    {
        $list = [1,2,3];

        $this->assertEquals(3, count($list));
    }
}
?>
-----
<?php
class Test {
    public function test()
    {
        $list = [1,2,3];

        $this->assertCount(3, $list);
    }
}
?>
