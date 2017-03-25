<?php

class __iumioTemp_6d6d2ca229ec5a4ae0b084fa9898dfc6 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<!DOCTYPE html>
';
        $buffer .= $indent . '<!-- Template by quackit.com -->
';
        $buffer .= $indent . '<html>
';
        $buffer .= $indent . '<head>
';
        $buffer .= $indent . '    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
';
        $buffer .= $indent . '    <title>3 Column Layout</title>
';
        $buffer .= $indent . '    <link type="text/css" rel="stylesheet" href="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->section8ad2cc96bd1df02d7f0ada40760c4a2f($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '    <script type="text/javascript">
';
        $buffer .= $indent . '        /* =============================
';
        $buffer .= $indent . '         This script generates sample text for the body content.
';
        $buffer .= $indent . '         You can remove this script and any reference to it.
';
        $buffer .= $indent . '         ============================= */
';
        $buffer .= $indent . '        var bodyText=["The smaller your reality, the more convinced you are that you know everything.", "If the facts don\'t fit the theory, change the facts.", "The past has no power over the present moment.", "This, too, will pass.", "</p><p>You will not be punished for your anger, you will be punished by your anger.", "Peace comes from within. Do not seek it without.", "<h3>Heading</h3><p>The most important moment of your life is now. The most important person in your life is the one you are with now, and the most important activity in your life is the one you are involved with now."]
';
        $buffer .= $indent . '        function generateText(sentenceCount){
';
        $buffer .= $indent . '            for (var i=0; i<sentenceCount; i++)
';
        $buffer .= $indent . '                document.write(bodyText[Math.floor(Math.random()*7)]+" ")
';
        $buffer .= $indent . '        }
';
        $buffer .= $indent . '    </script>
';
        $buffer .= $indent . '</head>';

        return $buffer;
    }

    private function section8ad2cc96bd1df02d7f0ada40760c4a2f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/css/index.css';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'public/css/index.css';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
